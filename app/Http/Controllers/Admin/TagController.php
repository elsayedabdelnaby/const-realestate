<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\CreateTagReqeust;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_tags'])->only('index');
        $this->middleware(['permission:create_tags'])->only(['create', 'store']);
        $this->middleware(['permission:update_tags'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_tags'])->only(['destroy']);
    }

    public function index(Request $request)
    {
        $tags = Tag::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('name',    '%' . $request->search . '%');
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.tags.index', compact('tags'));
    } // end of index

    public function create()
    {
        return view('admin.tags.create');
    } // end of create
    public function store(CreateTagReqeust $request)
    {
        try {
            Tag::create($request->except(['_token', '_method']));
            session()->flash('success', 'Tag Added Successfully');
            return redirect()->route('admin.tags.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator' . $exception->getMessage());
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of store

    public function edit($id)
    {
        try {
            $tag = Tag::find($id);
            if (!$tag) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.tags.index');
            }
            return view('admin.tags.edit', compact('tag'));
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $tag = Tag::find($id);
            if (!$tag) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.tags.index');
            }

            $tag->update($request->except(['_token', '_method']));

            session()->flash('success', 'Tag Updated Successfully');
            return redirect()->route('admin.tags.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $tag = tag::find($id);
            if (!$tag) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.tags.index');
            }

            $tag->deleteTranslations();
            $tag->delete();

            session()->flash('success', 'Tag Deleted Successfully');
            return redirect()->route('admin.tags.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of destroy
}
