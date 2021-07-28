<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\Admin\City;
use App\Models\Admin\Country;
use App\Models\Project;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_projects'])->only('index');
        $this->middleware(['permission:create_projects'])->only(['create', 'store']);
        $this->middleware(['permission:update_projects'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_projects'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $agencies = Agency::all();

        $projects = Project::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('name',    '%' . $request->search . '%');
        })->when($request->agency_id, function ($query) use ($request) {
            return $query->where('agency_id', $request->agency_id);
        })->latest()->paginate(PAGINATION_COUNT);

        return view('admin.projects.index', compact('projects', 'agencies'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $agencies = Agency::all();
        return view(
            'admin.projects.create',
            compact('countries', 'cities', 'agencies')
        );
    }

    public function store(Request $request)
    {
        try {
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request->has('is_featured') ? $request->request->add(['is_featured' => 1]) : $request->request->add(['is_featured' => 0]);
            $request->has('finish_status') ? $request->request->add(['finish_status' => 1]) : $request->request->add(['finish_status' => 0]);

            $request_data = $request->except('_method', '_token');

            if ($request->image) {
                request()->image->move(public_path('/uploads/projects/'), $request->image->hashName());
                $request_data['image'] = $request->image->hashName();
            }

            if ($request->gallery) {
                $gallery_arr = [];
                foreach ($request->gallery as $index => $item) {
                    $gallery_arr += [$index => $item->hashName(),];
                    $item->move(public_path('/uploads/projects/gallery/'), $item->hashName());
                }
                $request_data['gallery'] = json_encode($gallery_arr);
            }

            if ($request->sketches) {
                $sketches_arr = [];
                foreach ($request->sketches as $index => $item) {
                    $sketches_arr += [$index => $item->hashName(),];
                    $item->move(public_path('/uploads/projects/gallery/'), $item->hashName());
                }
                $request_data['sketches'] = json_encode($sketches_arr);
            }

            Project::create($request_data);

            session()->flash('success', 'Project Added Successfully');
            return redirect()->route('admin.projects.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
            session()->flash('error', 'Something Went Wrong, Please Contact Administrator, ' . $e->getMessage());
            return redirect()->route('admin.projects.index');
        }
    }
}
