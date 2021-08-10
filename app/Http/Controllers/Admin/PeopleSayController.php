<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeopleSay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class PeopleSayController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:view_people_says'])->only('index');
        $this->middleware(['permission:create_people_says'])->only(['create', 'store']);
        $this->middleware(['permission:update_people_says'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_people_says'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $people_says = PeopleSay::when($request->name, function ($query) use ($request) {
            return $query->where('name', 'LIKE', '%' . $request->name . '%');
        })->when($request->job, function ($query) use ($request) {
            return $query->where('job', 'LIKE', '%' . $request->job . '%');
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.people_says.index', compact('people_says'));
    }

    public function create()
    {
        return view('admin.people_says.create');
    } // end of create

    public function store(Request $request)
    {
        try {
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request_data = $request->all();

            if ($request->file('image')) {
                $request_data['image'] = $request->image->hashName();
                $image = $request->file('image');
                $image->move(public_path('uploads/peoplesays') . '/', $request->image->hashName());
            }

            PeopleSay::create($request_data);

            session()->flash('success', 'People Say Added Successfully');
            return redirect()->route('admin.people-says.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.people-says.index');
        } // end of try -> catch\

    } // end of store

    public function edit($id)
    {
        try {
            $people_say = PeopleSay::find($id);
            if (!$people_say) {
                session()->flash('error', "People Say Doesn't Exist or has been deleted");
                return redirect()->route('admin.people-says.index');
            }

            return view('admin.people_says.edit', compact('people_say'));
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.people-says.index');
        } // end of try -> catch

    } // end of edit

    public function update(Request $request, PeopleSay $people_say)
    {
        try {
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request_data = $request->all();

            if ($request->file('image')) {
                if ($people_say->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/peoplesays/' . $people_say->image);
                } // end of inner if

                Image::make($request->image)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/peoplesays/' . $request->image->hashName()));
                $request_data['image'] = $request->image->hashName();
            }

            $people_say->update($request_data);

            session()->flash('success', 'People Say Updated Successfully');
            return redirect()->route('admin.people-says.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.people-says.index');
        } // end of try -> catch

    } // end of update

    public function destroy(PeopleSay $people_say)
    {
        try {

            if ($people_say->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/peoplesays/' . $people_say->image);
            }

            $people_say->delete();

            session()->flash('success', 'People Say Deleted Successfully');
            return redirect()->route('admin.people-says.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.people-says.index');
        }
    } // end of destroy
}
