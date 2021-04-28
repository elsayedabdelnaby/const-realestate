<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyStatus;
use App\Models\Admin\PropertyType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::all();
        $property_statuses = PropertyStatus::all();
        $property_types = PropertyType::all();

        // properties details with search inquiries
        $properties = Property::with('country','city')
            ->when($request -> city_id , function($query) use ($request) {
            return $query -> where('city_id', $request -> city_id);
            })->when($request -> property_status , function($query) use ($request) {
            return $query -> where('property_status_id', $request -> property_status);
            })->when($request -> property_type , function($query) use ($request) {
            return $query -> where('property_type_id', $request -> property_type);
            })->when($request -> rent_sale , function($query) use ($request) {
                return $query -> where('rent_sale', $request -> rent_sale);
        })->latest()->paginate(PAGINATION_COUNT);

        return view('front.properties.index' , compact('cities', 'property_statuses', 'property_types' , 'properties'));

    } // end of index

    public function show($id)
    {
        $property = Property::find($id);
        return view('front.properties.show', compact('property'));

    } // end of show
}
