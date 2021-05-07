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
        $recent_blogs = Blog::where([
            ['is_active', 1],
        ])->orderBy('created_at', 'ASC')->limit(5)->get();

        return view('front.blogs.index', compact('blogs', 'recent_blogs'));
    } // end of index

    public function show($slug)
    {
        $blog = Blog::whereTranslationLike('meta_slug', $slug)->firstOrFail();
        $recent_blogs = Blog::where([
            ['is_active', 1],
            ['id', '<>', $blog->id],
        ])->orderBy('created_at', 'ASC')->limit(5)->get();

        return view('front.blogs.details', compact('blog', 'recent_blogs'));
    }
} // end of controller
