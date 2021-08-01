<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Project;
use App\Models\SEO;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::with('country', 'city')
            ->where('is_active', 1)
            ->when($request->city_id, function ($query) use ($request) {
                return $query->where('city_id', $request->city_id);
            })->when($request->finish_status, function ($query) use ($request) {
                return $query->where('finish_status', $request->finish_status);
            })->latest()->paginate(PAGINATION_COUNT);

        $cities = City::all();
        $meta_data = SEO::where('page_name', 'projects')->firstOrFail();
        $recent_projects = Project::latest()->limit(3)->get();

        return view('front.projects.index')->with([
            'projects' => $projects,
            'meta_data' => $meta_data,
            'cities' => $cities,
            'page_name' => 'projects',
            'recent_projects' => $recent_projects
        ]);
    }

    public function show(Request $request, $slug){
        
    }
}
