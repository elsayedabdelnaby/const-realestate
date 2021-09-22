<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyStatus;
use App\Models\Admin\PropertyType;
use App\Models\SEO;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::all();
        $property_statuses = PropertyStatus::all();
        $property_types = PropertyType::all();
        $meta_data = SEO::where('page_name', 'properties')->firstOrFail();
        $page_name = 'properties';
        $popular_tags = Tag::where([
            'is_active' => 1,
            'is_popular_tag' => 1
        ])->get();
        // properties details with search inquiries
        $properties = Property::with('country', 'city')
            ->when($request->city_id, function ($query) use ($request) {
                return $query->where('city_id', $request->city_id);
            })->when($request->property_status, function ($query) use ($request) {
                return $query->where('property_status_id', $request->property_status);
            })->when($request->property_type, function ($query) use ($request) {
                return $query->where('property_type_id', $request->property_type);
            })->when($request->rent_sale, function ($query) use ($request) {
                return $query->where('rent_sale', $request->rent_sale);
            })->when($request->min_area, function ($query) use ($request) {
                return $query->where('plot_area', '>=', $request->min_area);
            })->when($request->max_area, function ($query) use ($request) {
                return $query->where('plot_area', '<=', $request->min_area);
            })->when($request->tag, function ($query) use ($request) {
                $tag = Tag::whereHas('translations', function ($query) use ($request) {
                    $query->where('slug', $request->tag);
                })->first();
                return $query->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag->id);
                });
            })
            ->latest()->paginate(PAGINATION_COUNT);

        $recent_properties = Property::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('front.properties.index', compact('cities', 'property_statuses', 'property_types', 'properties', 'meta_data', 'page_name', 'recent_properties', 'popular_tags'));
    } // end of index

    public function show($slug)
    {
        $page_name = 'properties';
        $property = Property::whereHas('translations', function ($query) use ($slug) {
            $query->where('meta_slug', 'LIKE', '%' . $slug . '%');
        })->get()[0];
        return view('front.properties.show', compact('property', 'page_name'));
    } // end of show
}
