<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyType\PropertyTypeCreateRequest;
use App\Http\Requests\Admin\PropertyType\PropertyTypeUpdateRequest;
use App\Models\Admin\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyTypeController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:read_property_types'])->only('index');
        $this -> middleware(['permission:create_property_types'])->only(['create', 'store']);
        $this -> middleware(['permission:update_property_types'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_property_types'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $propertyTypes = PropertyType::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
        })->latest()->paginate(PAGINATION_COUNT);

        return view('admin.property_types.index', compact('propertyTypes'));

    } // end of index

    public function create()
    {
        return view('admin.property_types.create');

    } // end of create
    public function store(PropertyTypeCreateRequest $request)
    {
        try {
            PropertyType::create($request->all());

            session()->flash('success', 'Property Type Added Successfully');
            return redirect()->route('admin.property_types.index');
        } catch(\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_types.index');

        } // end of try -> catch

    } // end of store

    public function edit($id)
    {
        try {
            $propertyType = PropertyType::find($id);
            if(!$propertyType) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.property_types.index');
            }
            return view('admin.property_types.edit', compact('propertyType'));

        } catch(\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_types.index');

        } // end of try -> catch

    } // end of edit

    public function update(PropertyTypeUpdateRequest $request, $id)
    {
        try {
            $propertyType = PropertyType::find($id);
            if(!$propertyType) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.property_types.index');
            }

            $propertyType -> update($request -> all());

            session()->flash('success', 'Property Type Updated Successfully');
            return redirect()->route('admin.property_types.index');

        } catch(\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_types.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $propertyType = PropertyType::find($id);
            if(!$propertyType) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.property_types.index');
            }

            $propertyType -> deleteTranslations();
            $propertyType -> delete();

            session()->flash('success', 'Property Type Deleted Successfully');
            return redirect()->route('admin.property_types.index');

        } catch(\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_types.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
