<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogCreateRequest;
use App\Http\Requests\Admin\Blog\BlogUpdateRequest;
use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:read_blogs'])->only('index');
        $this -> middleware(['permission:create_blogs'])->only(['create', 'store']);
        $this -> middleware(['permission:update_blogs'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_blogs'])->only(['destroy']);
    } // end of construct

    public function index()
    {
        $blogs = Blog::paginate(PAGINATION_COUNT);
        return view ('admin.blogs.index', compact('blogs'));
    } // end of index

    public function create()
    {
        return view('admin.blogs.create');
    } // end of create

    public function store(BlogCreateRequest $request)
    {
        try {
            $request_data = $request -> all();

            if ($request -> image) {
                Image::make($request->image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/blogs/'. $request ->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            }
            Blog::create($request_data);

            session()->flash('success', 'Blog Added Successfully');
            return redirect()->route('admin.blogs.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.blogs.index');

        } // end of try -> catch

    } // end of store

    public function show(Blog $blog)
    {
        //
    } // end of show


    public function edit($id)
    {
        try {
            $blog = Blog::find($id);

            if(!$blog){
                session()->flash('error', "Blog Doesn't Exist or has been deleted");
                return redirect()->route('admin.blogs.index');
            }

            return view('admin.blogs.edit', compact('blog'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.blogs.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $blog = Blog::find($id);

            if(!$blog){
                session()->flash('error', "Blog Doesn't Exist or has been deleted");
                return redirect()->route('admin.blogs.index');
            }

            $request_data = $request -> except([ 'image']);

            if($request->image){
                if ($blog->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/blogs/' . $blog ->image);

                } // end of inner if

                Image::make($request->image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('public/uploads/blogs/'. $request ->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            } // end of outer if

            $blog->update($request_data);

            session()->flash('success', 'Blog Added Successfully');
            return redirect()->route('admin.blogs.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.blogs.index');

        } // end of try -> catch


    } // end of update

    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);
            if(!$blog){
                session()->flash('error', "Blog Doesn't Exist or has been deleted");
                return redirect()->route('admin.agencies.index');
            }

            if($blog -> image != 'default.png'){
                Storage::disk('public_uploads')->delete('/blogs/' . $blog ->image);
            }

            $blog -> deleteTranslations();
            $blog -> delete();

            session()->flash('success', 'Blog Deleted Successfully');
            return redirect()->route('admin.blogs.index');
        } catch (\Exception $exception){

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.blogs.index');

        } // end of try -> catch
    } // end of destroy

} // end of controller
