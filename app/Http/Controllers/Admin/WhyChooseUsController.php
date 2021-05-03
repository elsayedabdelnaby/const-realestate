<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_why_choose_us'])->only('index');
        $this->middleware(['permission:create_why_choose_us'])->only(['create', 'store']);
        $this->middleware(['permission:update_why_choose_us'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_why_choose_us'])->only(['destroy']);
    } // end of construct
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $whychooseus = WhyChooseUs::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('title',    '%' . $request->search . '%');
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.whychooseus.index', compact('whychooseus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.whychooseus.create');
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
            // set active
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);

            $request_data = $request->all();

            if ($request->image) {
                $request_data['image'] = $request->image->hashName();
                $image = $request->file('image');
                $image->move(public_path('uploads/whychooseus') . '/', $request->image->hashName());
            }

            WhyChooseUs::create($request_data);

            session()->flash('success', 'WhyChooseUs Added Successfully');
            return redirect()->route('admin.whychooseus.index');
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->route('admin.whychooseus.index');
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
            $whychooseus = WhyChooseUs::findorFail($id);
            return view('admin.whychooseus.edit', compact('whychooseus'));
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.whychooseus.index');
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
        $whychooseus = WhyChooseUs::findorFail($id);

        $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
        $request_data = $request->except(['image', '_token', '_method']);

        if ($request->image) {
            Storage::disk('public_uploads')->delete('/whychooseus/' . $whychooseus->image);
            $request_data['image'] = $request->image->hashName();
            $image = $request->file('image');
            $image->move(public_path('uploads/whychooseus') . '/', $request->image->hashName());
        } // end of outer if

        $whychooseus->update($request_data);

        session()->flash('success', 'Why Choose Us Updated Successfully');
        return redirect()->route('admin.whychooseus.edit', $whychooseus->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $whychooseus = WhyChooseUs::findorFail($id);
        Storage::disk('public_uploads')->delete('/whychooseus/' . $whychooseus->image);

        $whychooseus->deleteTranslations();
        $whychooseus->delete();

        session()->flash('success', 'Why Choose Us Deleted Successfully');
        return redirect()->route('admin.whychooseus.index');
    }
}
