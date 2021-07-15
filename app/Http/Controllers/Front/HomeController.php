<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\Admin\Blog;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyStatus;
use App\Models\Admin\PropertyType;
use App\Models\Partner;
use App\Models\SiteSetting;
use App\Models\Subscriber;
use App\Models\WhyChooseUs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $property_types = PropertyType::all();
        $property_statuses = PropertyStatus::all();
        $agencies = Agency::all();
        $properties = Property::all();
        $site_settings = SiteSetting::firstOrFail();
        $whychooseus = WhyChooseUs::where('is_active', 1)->get();
        $partners = Partner::where('is_active', 1)->get();
        $blogs = Blog::where([
            ['is_active', 1],
            ['show_in_homepage', 1],
        ])->limit(3)->get();
        $page_name = "home";

        return view('front.index', compact('property_types',
            'property_statuses', 'agencies', 'properties', 'site_settings',
            'whychooseus', 'blogs', 'partners', 'page_name'));
    }

    public function addSubscriber(Request $request){
        $subscribers = Subscriber::where('email', $request->email)->get();
        if(count($subscribers)){
            return response()->json([
                'result' => 'failer',
                'msg' => 'You Already Susbribed',
            ]);
        } else {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
            return response()->json([
                'result' => 'success',
                'msg' => 'You Subscribed Successfully',
            ]);
        }
    }
}
