<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyStatus;
use App\Models\Admin\PropertyType;
use App\Models\SiteSetting;
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

        return view('front.index', compact('property_types', 'property_statuses', 'agencies', 'properties', 'site_settings'));
    }
}
