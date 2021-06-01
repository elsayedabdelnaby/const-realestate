<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_categories'])->only('index');
        $this->middleware(['permission:create_categories'])->only(['create', 'store']);
        $this->middleware(['permission:update_categories'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_categories'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('name',    '%' . $request->search . '%');
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request_data = $request->except(['_token', '_method']);
            Category::create($request_data);
            session()->flash('success', 'Tag Added Successfully');
            return redirect()->route('admin.categories.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator' . $exception->getMessage());
            return redirect()->route('admin.categories.index');
        } // end of try -> catch
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                session()->flash('error', "Category Doesn't Exist or has been deleted");
                return redirect()->route('admin.categories.index');
            }
            return view('admin.categories.edit', compact('category'));
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator '. $exception->getMessage());
            return redirect()->route('admin.categories.index');
        } // end of try -> catch
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.categories.index');
            }
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $category->update($request->except(['_token', '_method']));

            session()->flash('success', 'Tag Updated Successfully');
            return redirect()->route('admin.categories.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.categories.index');
        } // end of try -> catch
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.categories.index');
            }

            $category->deleteTranslations();
            $category->delete();

            session()->flash('success', 'Tag Deleted Successfully');
            return redirect()->route('admin.categories.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.categories.index');
        } // end of try -> catch

    }
}
