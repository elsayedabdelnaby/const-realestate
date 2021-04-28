<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $site_settings = SiteSetting::findorFail($id);
        return view('admin.site_settings.edit', compact('site_settings'));
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
        $site_settings = SiteSetting::findorFail($id);

        $request_data = $request -> except([ 'logo', '_token', '_method']);

        if($request->logo){
            if ($site_settings->logo != 'logo.svg') {

                Storage::disk('public_uploads')->delete('/front/images/' . $site_settings->logo );

            } // end of inner if

            Image::make($request->logo)->resize(63, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('front/images/'. $request->logo->hashName()));

            $request_data['logo'] = $request->logo->hashName();
        } // end of outer if

        $site_settings->update($request_data);

        session()->flash('success', 'Site Settings Updated Successfully');
        return redirect()->route('admin.sitesettings.update', $site_settings->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
