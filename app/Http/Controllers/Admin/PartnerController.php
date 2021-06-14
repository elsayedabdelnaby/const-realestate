<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;


class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_partners'])->only('index');
        $this->middleware(['permission:create_partners'])->only(['create', 'store']);
        $this->middleware(['permission:update_partners'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_partners'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partners = Partner::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('name',    '%' . $request->search . '%');
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request_data = $request->except(['_token', '_method']);
            if ($request->logo) {
                Image::make($request->logo)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/partners/' . $request->logo->hashName()));

                $request_data['logo'] = $request->logo->hashName();
            }
            Partner::create($request_data);
            session()->flash('success', 'Partner Added Successfully');
            return redirect()->route('admin.partners.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator' . $exception->getMessage());
            return redirect()->route('admin.partners.index');
        } // end of try -> catch
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $partner = Partner::find($id);
            if (!$partner) {
                session()->flash('error', "Partner Doesn't Exist or has been deleted");
                return redirect()->route('admin.partners.index');
            }
            return view('admin.partners.edit', compact('partner'));
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator '. $exception->getMessage());
            return redirect()->route('admin.partners.index');
        } // end of try -> catch
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
        try {
            $partner = Partner::find($id);
            if (!$partner) {
                session()->flash('error', "Partner Doesn't Exist or has been deleted");
                return redirect()->route('admin.partners.index');
            }
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);

            $request_data = $request->except(['logo', '_token', '_method']);

            if ($request->logo) {
                if ($partner->logo != 'default.jpg') {

                    Storage::disk('public_uploads')->delete('/partners/' . $partner->logo);
                } // end of inner if

                Image::make($request->logo)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/partners/' . $request->logo->hashName()));
                $request_data['logo'] = $request->logo->hashName();
            }

            $partner->update($request_data);

            session()->flash('success', 'Partner Updated Successfully');
            return redirect()->route('admin.partners.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.partners.index');
        } // end of try -> catch
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Partner::find($id);
            if (!$category) {
                session()->flash('error', "Partner Doesn't Exist or has been deleted");
                return redirect()->route('admin.partners.index');
            }

            $category->deleteTranslations();
            $category->delete();

            session()->flash('success', 'Partner Deleted Successfully');
            return redirect()->route('admin.partners.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.partners.index');
        } // end of try -> catch
    }
}
