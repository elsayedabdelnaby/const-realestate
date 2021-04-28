<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index(Request $request)
    {
        $agencies = Agency::paginate(PAGINATION_COUNT);
        return view('front.agencies.index' , compact('agencies'));

    } // end of index

    public function show($id)
    {
        $agency = Agency::find($id);
        return view('front.agencies.show', compact('agency'));

    } // end of show

} // end of controller
