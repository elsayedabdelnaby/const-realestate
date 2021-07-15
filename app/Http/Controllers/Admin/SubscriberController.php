<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subscribers = Subscriber::when($request->search, function ($query) use ($request) {
            return $query->where('email',    'LIKE', '%' . $request->search . '%');
        })->latest()->paginate(PAGINATION_COUNT);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:subscribers',
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        session()->flash('success', 'Subscriber Added Successfully');
        return redirect()->route('admin.subscribers.index');
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
        $subscriber = Subscriber::findOrFail($id);
        return view('admin.subscribers.edit', compact('subscriber'));
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
        $subscriber = Subscriber::findorFail($id);
        Validator::make($request->all(), [
            'email' => [
                'required',
                Rule::unique('subscribers')->ignore($id),
            ],
        ]);
        $subscriber->is_active = 1;
        if(!$request->has('is_active')){
            $subscriber->is_active = 0;
        }
        $subscriber->email = $request->email;
        $subscriber->update();

        session()->flash('success', 'Subscriber Updated Successfully');
        return redirect()->route('admin.subscribers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        if (!$subscriber) {
            session()->flash('error', "Subscriber Doesn't Exist or has been deleted");
            return redirect()->route('admin.subsribers.index');
        }

        $subscriber->delete();

        session()->flash('success', 'Subscriber Deleted Successfully');
        return redirect()->route('admin.subscribers.index');
    }
}
