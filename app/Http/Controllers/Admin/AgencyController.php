<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Agency\AgencyCreateRequest;
use App\Http\Requests\Admin\Agency\AgencyUpdateRequest;
use App\Models\Admin\Agency;
use App\Models\Admin\City;
use App\Models\Admin\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;

class AgencyController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:read_agencies'])->only('index');
        $this -> middleware(['permission:create_agencies'])->only(['create', 'store']);
        $this -> middleware(['permission:update_agencies'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_agencies'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $agencies = Agency::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
        })->latest()->paginate(PAGINATION_COUNT);

        return view('admin.agencies.index', compact('agencies'));

    } // end of index

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        return view('admin.agencies.create', compact('countries', 'cities'));

    }// end of create

    public function store(AgencyCreateRequest $request)
    {
        try {
            $request_data = $request -> all();

            if ($request -> image) {
                Image::make($request->image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/agencies/'. $request ->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            }

            Agency::create($request_data);

            session()->flash('success', 'Agency Added Successfully');
            return redirect()->route('admin.agencies.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->back();

        } // end of try -> catch

    } // end of store

    public function edit($id)
    {
        try {
            $agency = Agency::find($id);

            if(!$agency){
                session()->flash('error', "Agency Doesn't Exist or has been deleted");
                return redirect()->route('admin.agencies.index');
            }

            $countries = Country::all();
            $cities = City::all();

            return view('admin.agencies.edit', compact('agency', 'countries', 'cities'));
        } catch (\Exception $exception) {
            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.agencies.index');
        }

    } // end of edit

    public function show($id)
    {
        try {
            $agency = Agency::find($id);

            if(!$agency){
                session()->flash('error', "Agency Doesn't Exist or has been deleted");
                return redirect()->route('admin.agencies.index');
            }

            $countries = Country::all();
            $cities = City::all();

            return view('admin.agencies.edit', compact('agency', 'countries', 'cities'));
        } catch (\Exception $exception) {
            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.agencies.index');
        } // end of try -> catch

    } // end of edit

    public function update(AgencyUpdateRequest $request, $id)
    {
        try {
            $agency = Agency::find($id);

            if(!$agency){
                session()->flash('error', "Agency Doesn't Exist or has been deleted");
                return redirect()->route('admin.agencies.index');
            }

            $request_data = $request -> except([ 'image']);

            if($request->image){
                if ($agency->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/agencies/' . $agency ->image);

                } // end of inner if

                Image::make($request->image)->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('public/uploads/agencies/'. $request ->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            } // end of outer if

            $agency->update($request_data);

            session()->flash('success', 'Agency Updated Successfully');
            return redirect()->route('admin.agencies.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.agencies.index');

        } // end of try -> cache

    } // end of update

    public function destroy($id)
    {
        try {
            $agency = Agency::find($id);
            if(!$agency){
                session()->flash('error', "Agency Doesn't Exist or has been deleted");
                return redirect()->route('admin.agencies.index');
            }

            if($agency -> image != 'default.png'){
                Storage::disk('public_uploads')->delete('/agencies/' . $agency ->image);
            }

            $agency -> deleteTranslations();
            $agency -> delete();

            session()->flash('success', 'Agency Deleted Successfully');
            return redirect()->route('admin.agencies.index');
        } catch (\Exception $exception){

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.agencies.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
