<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyStatus;
use App\Models\Admin\PropertyType;
use App\Models\SEO;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cities = City::all();
        $property_statuses = PropertyStatus::all();
        $property_types = PropertyType::all();
        $meta_data = SEO::where('page_name', 'properties')->firstOrFail();
        $page_name = 'properties';
        // properties details with search inquiries
        $properties = Property::with('country', 'city')
            ->where('city_id', $id)
            ->paginate(PAGINATION_COUNT);

        return view('front.properties.index', compact('cities', 'property_statuses', 'property_types', 'properties', 'meta_data', 'page_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
