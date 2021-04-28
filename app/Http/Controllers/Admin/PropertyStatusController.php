<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyStatus\PropertyStatusCreateRequest;
use App\Http\Requests\Admin\PropertyStatus\PropertyStatusUpdateRequest;
use App\Models\Admin\PropertyStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyStatusController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:read_property_statuses'])->only('index');
        $this -> middleware(['permission:create_property_statuses'])->only(['create', 'store']);
        $this -> middleware(['permission:update_property_statuses'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_property_statuses'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $propertyStatuses = PropertyStatus::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
        })->latest()->paginate(PAGINATION_COUNT);

        return view('admin.property_statuses.index', compact('propertyStatuses'));
    } // end of index

    public function create()
    {
       return view('admin.property_statuses.create');

    } // end of create

    public function store(PropertyStatusCreateRequest $request)
    {
        try {
            PropertyStatus::create($request->all());
            session()->flash('success', 'Property Status Added Successfully');
            return redirect()->route('admin.property_statuses.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_statuses.index');

        } // end of try -> catch

    } // end of store

    public function edit($id)
    {
        try {
            $propertyStatus = PropertyStatus::find($id);
            if(!$propertyStatus) {
                session()->flash('error', "Status Doesn't Exist or has been deleted");
                return redirect()->route('admin.property_statuses.index');
            }

            return view('admin.property_statuses.edit', compact('propertyStatus'));

        } catch(\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_statuses.index');

        } // end of try -> catch

    } // end of edit

    public function update(PropertyStatusUpdateRequest $request, $id)
    {
        try {
            $propertyStatus = PropertyStatus::find($id);
            if(!$propertyStatus) {
                session()->flash('error', "Status Doesn't Exist or has been deleted");
                return redirect()->route('admin.property_statuses.index');
            }

            $propertyStatus -> update($request -> all());

            session()->flash('success', 'Property Status Updated Successfully');
            return redirect()->route('admin.property_statuses.index');

        } catch(\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_statuses.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $propertyStatus = PropertyStatus::find($id);
            if(!$propertyStatus) {
                session()->flash('error', "Status Doesn't Exist or has been deleted");
                return redirect()->route('admin.property_statuses.index');
            }

            $propertyStatus -> deleteTranslations();
            $propertyStatus -> delete();

            session()->flash('success', 'Property Status Deleted Successfully');
            return redirect()->route('admin.property_statuses.index');

        } catch(\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.property_statuses.index');

        } // end of try -> catch

    }// end of destroy

} // end of controller
