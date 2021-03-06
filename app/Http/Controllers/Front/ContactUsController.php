<?php

namespace App\Http\Controllers\Front;

use App\Models\ContactUsMessage;
use App\Http\Controllers\Controller;
use App\Models\SEO;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'contactus';
        $meta_data = SEO::where('page_name', 'contact')->firstOrFail();
        return view('front.contact-us', compact('page_name', 'meta_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactus_message = new ContactUsMessage();
        if (isset($request->user_id)) {
            $contactus_message->user_id = $request->user_id;
        }
        $contactus_message->name = $request->name;
        $contactus_message->phone = $request->phone;
        $contactus_message->email = $request->email;
        $contactus_message->text = $request->message;
        $contactus_message->type = $request->type;
        $contactus_message->save();
        return true;
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
        //
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
        //
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
