<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\SEO;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index(Request $request)
    {
        $agencies = Agency::paginate(PAGINATION_COUNT);
        $meta_data = SEO::where('page_name', 'agencies')->firstOrFail();
        $page_name = 'agencies';
        return view('front.agencies.index' , compact('agencies', 'meta_data', 'page_name'));

    } // end of index

    public function show($id)
    {
        $agency = Agency::find($id);
        $page_name = 'agencies';
        return view('front.agencies.show', compact('agency', 'page_name'));

    } // end of show

} // end of controller
