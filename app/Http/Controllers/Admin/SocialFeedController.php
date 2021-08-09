<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialFeed;
use Illuminate\Http\Request;

class SocialFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $social_feeds = SocialFeed::when($request->search, function ($query) use ($request) {
            return $query->where('title', 'LIKE', '%'. $request->search . '%');
        })->when($request -> type , function($query) use ($request) {
            return $query -> where('type', $request -> type);
        })->when($request -> url , function($query) use ($request) {
            return $query -> where('url', 'LIKE', '%' .$request -> url . '%');
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.social_feeds.index', compact('social_feeds'));
    }

    public function create()
    {
        return view('admin.social_feeds.create');

    } // end of create

    public function store(Request $request)
    {
        try {
            $request -> has('display_in_home') ? $request -> request -> add(['display_in_home' => 1]) : $request -> request -> add(['display_in_home' => 0]);
            $request_data = $request -> all();
            SocialFeed::create($request_data);

            session()->flash('success', 'Social Feed Added Successfully');
            return redirect()->route('admin.social-feeds.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.social-feeds.index');

        } // end of try -> catch\

    } // end of store

    public function edit($id)
    {
        try {
            $social_feed = SocialFeed::find($id);
            if(!$social_feed) {
                session()->flash('error', "Social Feed Doesn't Exist or has been deleted");
                return redirect()->route('admin.social-feeds.index');
            }

            return view('admin.social_feeds.edit', compact('social_feed'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.social-feeds.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, SocialFeed $social_feed)
    {
        try {
            $request -> has('display_in_home') ? $request -> request -> add(['display_in_home' => 1]) : $request -> request -> add(['display_in_home' => 0]);
            $request_data = $request->all();
            $social_feed->update($request_data);

            session()->flash('success', 'Property Updated Successfully');
            return redirect()->route('admin.social-feeds.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.social-feeds.index');

        } // end of try -> catch

    } // end of update

    public function destroy(SocialFeed $social_feed)
    {
        try {

            $social_feed -> delete();

            session()->flash('success', 'Social Feed Deleted Successfully');
            return redirect()->route('admin.social-feeds.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.social-feeds.index');

        }

    } // end of destroy

}
