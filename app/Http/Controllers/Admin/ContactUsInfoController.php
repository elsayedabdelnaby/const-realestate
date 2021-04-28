<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUsInfoUpdateRequest;
use App\Models\ContactUsInfo;
use Illuminate\Http\Request;

class ContactUsInfoController extends Controller
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
        $contact_us_info = ContactUsInfo::findOrFail($id);
        return view('admin.contact_us_info.edit', compact('contact_us_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUsInfoUpdateRequest $request, $id)
    {
        $contact_us_info = ContactUsInfo::findOrFail($id);

        $contact_us_info->phone = $request->phone;
        $contact_us_info->location_title = $request->location_title;
        $contact_us_info->location_link = $request->location_link;
        $contact_us_info->email = $request->email;
        $contact_us_info->facebook_url = $request->facebook_url;
        $contact_us_info->twitter_url = $request->twitter_url;
        $contact_us_info->instagram_url = $request->instagram_url;
        $contact_us_info->linkedin_url = $request->linkedin_url;
        $contact_us_info->start_working_at = $request->start_working_at;
        $contact_us_info->end_working_at=  $request->end_working_at;

        $contact_us_info->save();

        session()->flash('success', 'Contact Us Info Updated Successfully');
        return redirect()->route('admin.contactusinfo.update', [$id]);

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
