<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feature\FeatureCreateRequest;
use App\Http\Requests\Admin\Feature\FeatureUpdateRequest;
use App\Models\Admin\Feature;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:read_features'])->only('index');
        $this -> middleware(['permission:create_features'])->only(['create', 'store']);
        $this -> middleware(['permission:update_features'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_features'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $features = Feature::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
        })->latest()->paginate(PAGINATION_COUNT);

        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');

    }// end of create

    public function store(FeatureCreateRequest $request)
    {
        try {
            Feature::create($request->all());

            session()->flash('success', 'Feature Added Successfully');
            return redirect()->route('admin.features.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.features.index');

        } // end of try -> catch

    } // end of store

    public function edit($id)
    {
        try {
            $feature = Feature::find($id);
            if(!$feature) {
                session()->flash('error', "Feature Doesn't Exist or has been deleted");
                return redirect()->route('admin.features.index');
            }
            return view('admin.features.edit', compact('feature'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.features.index');

        } // end of try -> catch

    } // end of edit

    public function update(FeatureUpdateRequest $request, $id)
    {
        try {
            $feature = Feature::find($id);
            if(!$feature) {
                session()->flash('error', "Feature Doesn't Exist or has been deleted");
                return redirect()->route('admin.features.index');
            }

            $feature -> update($request -> all());

            session()->flash('success', 'Feature Updated Successfully');
            return redirect()->route('admin.features.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.features.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $feature = Feature::find($id);
            if(!$feature) {
                session()->flash('error', "Feature Doesn't Exist or has been deleted");
                return redirect()->route('admin.features.index');
            }

            $feature -> deleteTranslations();
            $feature -> delete();

            session()->flash('success', 'Feature Deleted Successfully');
            return redirect()->route('admin.features.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.features.index');

        }// end of try -> catch

    } // end of destroy

} // end of controller s
