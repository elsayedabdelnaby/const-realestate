<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\Admin\City;
use App\Models\Admin\Country;
use App\Models\Project;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

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

    public function edit($id)
    {
        try {
            $project = Project::find($id);
            if(!$project) {
                session()->flash('error', "Project Doesn't Exist or has been deleted");
                return redirect()->route('admin.projects.index');
            }

            $countries = Country::all();
            $cities = City::all();
            $agencies = Agency::all();

            return view('admin.projects.edit',
                compact('project', 'countries', 'cities', 'agencies'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.properties.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, Project $project)
    {
        try {
            // set active
            $request -> has('is_active') ? $request -> request -> add(['is_active' => 1]) : $request -> request -> add(['is_active' => 0]);
            $request -> has('is_featured') ? $request -> request -> add(['is_featured' => 1]) : $request -> request -> add(['is_featured' => 0]);
            $request -> has('finish_status') ? $request -> request -> add(['finish_status' => 1]) : $request -> request -> add(['finish_status' => 0]);

            $request_data = $request -> except('gallery', '_token', '_method', 'sketches');

            if($request->image){
                if ($project->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/projects/' . $project ->image);

                } // end of image inner if

                request()->image->move(public_path('/uploads/projects/'), $request->image->hashName());

                $request_data['image'] = $request->image->hashName();
            } // end of image outer if.

            if($request -> gallery){

                if ($project -> gallery != null) {
                    foreach (json_decode($project->gallery, true) as $index => $item) {
                        Storage::disk('public_uploads')->delete('/projects/gallery/' . $item);
                    }
                    $project->update(['gallery' => null]);
                } // end of inner if

                $gallery_arr = [];
                foreach ( $request -> gallery as $index => $item){
                    $gallery_arr += [ $index => $item ->hashName(),];
                    $item->move(public_path('/uploads/projects/gallery/'), $item->hashName());
                }

                $project->update(['gallery' => json_encode($gallery_arr) ]);

            }

            if($request -> sketches){

                if ($project -> sketches != null) {
                    foreach (json_decode($project->sketches, true) as $index => $item) {
                        Storage::disk('public_uploads')->delete('/projects/gallery/' . $item);
                    }
                    $project->update(['sketches' => null]);
                } // end of inner if

                $sketches_arr = [];
                foreach ( $request -> sketches as $index => $item){
                    $sketches_arr += [ $index => $item ->hashName(),];
                    $item->move(public_path('/uploads/projects/gallery/'), $item->hashName());
                }

                $project->update(['sketches' => json_encode($sketches_arr) ]);

            }

            $project->update($request_data);

            session()->flash('success', 'Project Updated Successfully');
            return redirect()->route('admin.projects.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.projects.index');

        } // end of try -> catch

    } // end of update

    public function destroy(Project $project)
    {
        try {
            if($project -> image != 'default.png'){
                Storage::disk('public_uploads')->delete('/projects/' . $project ->image);
            }

            if ($project -> gallery != null) {
                foreach (json_decode($project->gallery, true) as $index => $item) {
                    Storage::disk('public_uploads')->delete('/projects/gallery/' . $item);
                }
                $project->update(['gallery' => null]);
            } // end of inner if

            if ($project -> sketches != null) {
                foreach (json_decode($project->sketches, true) as $index => $item) {
                    Storage::disk('public_uploads')->delete('/projects/gallery/' . $item);
                }
                $project->update(['sketches' => null]);
            } // end of inner if

            $project -> deleteTranslations();
            $project -> delete();

            session()->flash('success', 'Proejct Deleted Successfully');
            return redirect()->route('admin.projects.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.projects.index');

        }

    } // end of destroy
}
