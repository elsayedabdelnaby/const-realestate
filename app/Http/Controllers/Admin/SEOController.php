<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $seo_pages = SEO::when($request->search, function ($query) use ($request) {
            return $query->where('page_name', $request->search);
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.seo.index', compact('seo_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo.create');
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
            $request_data = $request->except(['_token', '_method']);
            SEO::create($request_data);
            session()->flash('success', 'SEO Added Successfully');
            return redirect()->route('admin.seo.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator' . $exception->getMessage());
            return redirect()->route('admin.seo.index');
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
        $page = SEO::findorFail($id);
        return view('admin.seo.edit', compact('page'));
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
            $page = SEO::find($id);
            if (!$page) {
                session()->flash('error', "SEO Doesn't Exist or has been deleted");
                return redirect()->route('admin.seo.index');
            }
            $page->update($request->except(['_token', '_method']));

            session()->flash('success', 'SEO Page Updated Successfully');
            return redirect()->route('admin.seo.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.seo.index');
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
            $page = SEO::find($id);
            if (!$page) {
                session()->flash('error', "SEO Page Doesn't Exist or has been deleted");
                return redirect()->route('admin.seo.index');
            }

            $page->deleteTranslations();
            $page->delete();

            session()->flash('success', 'SEO Page Deleted Successfully');
            return redirect()->route('admin.seo.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.seo.index');
        } // end of try -> catch
    }
}
