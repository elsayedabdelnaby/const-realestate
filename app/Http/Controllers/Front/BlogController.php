<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::paginate(PAGINATION_COUNT);
        return view('front.blogs.index' , compact('blogs'));

    } // end of index

} // end of controller
