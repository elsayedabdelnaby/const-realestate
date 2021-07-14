<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Category;
use App\Models\SEO;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $categories;
    protected $popular_tags;

    public function __construct()
    {
        $this->categories = Category::where('is_active', 1)->get();
        $this->popular_tags = Tag::where([
            'is_active' => 1,
            'is_popular_tag' => 1
        ])->get();
    }

    public function index(Request $request)
    {
        if ($request->has('category')) {
            $category = Category::whereHas('translations', function ($query) use ($request) {
                $query->where('meta_slug', $request->get('category'));
            })->first();
            $blogs = Blog::with('category')
                ->where('category_id', $category->id);
        }

        if ($request->has('tag')) {
            $tag = Tag::whereHas('translations', function ($query) use ($request) {
                $query->where('slug', $request->get('tag'));
            })->first();
            $blogs = DB::table('blogs')
                ->distinct()
                ->select('blogs.id as id')
                ->join('tags_blogs', 'tags_blogs.blog_id', '=', 'blogs.id')
                ->join('tags', 'tags_blogs.tag_id', '=', 'tags.id')
                ->whereNull(['blogs.deleted_at', 'blogs.deleted_at', 'blogs.deleted_at'])
                ->where('tags_blogs.tag_id', $tag->id)
                ->pluck('id')->toArray();
            $blogs = Blog::whereIn('id', $blogs);
        }
        if ($request->has('search_keyword')) {
            $search_keyword = $request->get('search_keyword');
            if (isset($blogs)) {
                $blogs->whereHas('translations', function ($query) use ($search_keyword) {
                    $query->where('title', 'LIKE', '%' . $search_keyword . '%');
                });
            } else {
                $blogs = Blog::whereHas('translations', function ($query) use ($search_keyword) {
                    $query->where('title', 'LIKE', '%' . $search_keyword . '%');
                });
            }
        }
        if (!isset($blogs)) {
            $blogs = Blog::paginate(PAGINATION_COUNT);
        } else {
            $blogs = $blogs->paginate(PAGINATION_COUNT);
        }
        $recent_blogs = Blog::where([
            ['is_active', 1],
        ])->orderBy('created_at', 'ASC')->limit(5)->get();

        $meta_data = SEO::where('page_name', 'blog')->firstOrFail();
        $page_name = 'blogs';

        return view('front.blogs.index')->with([
            'blogs' => $blogs,
            'recent_blogs' => $recent_blogs,
            'categories' => $this->categories,
            'popular_tags' => $this->popular_tags,
            'meta_data' => $meta_data,
            'page_name' => $page_name
        ]);
    } // end of index

    public function show($slug)
    {
        $blog = Blog::whereTranslationLike('meta_slug', $slug)->firstOrFail();
        $recent_blogs = Blog::where([
            ['is_active', 1],
            ['id', '<>', $blog->id],
        ])->orderBy('created_at', 'ASC')->limit(5)->get();

        return view('front.blogs.details')->with([
            'blog' => $blog,
            'recent_blogs' => $recent_blogs,
            'categories' => $this->categories,
            'popular_tags' => $this->popular_tags
        ]);
    }
} // end of controller
