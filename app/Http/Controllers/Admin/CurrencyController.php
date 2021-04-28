<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Currency\CurrencyCreateRequest;
use App\Http\Requests\Admin\Currency\CurrencyUpdateRequest;
use App\Models\Admin\Currency;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:read_currencies'])->only('index');
        $this -> middleware(['permission:create_currencies'])->only(['create', 'store']);
        $this -> middleware(['permission:update_currencies'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_currencies'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $currencies = Currency::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
        })->latest()->paginate(PAGINATION_COUNT);

        return view('admin.currencies.index', compact('currencies'));

    } // end of index

    public function create()
    {
        return view('admin.currencies.create');

    } // end of create

    public function store(CurrencyCreateRequest $request)
    {
        try {
            Currency::create($request->all());

            session()->flash('success', 'Currency Added Successfully');
            return redirect()->route('admin.currencies.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');

        }

    } // end of store

    public function edit($id)
    {
        try {
            $currency =Currency::find($id);
            if(!$currency) {
                session()->flash('error', "Currency Doesn't Exist or has been deleted");
                return redirect()->route('admin.currencies.index');
            }
            return view('admin.currencies.edit', compact('currency'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');


        } // end of try -> catch

    }// end of edit

    public function update(CurrencyUpdateRequest $request, $id)
    {
        try {
            $currency = Currency::find($id);
            if(!$currency) {
                session()->flash('error', "Currency Doesn't Exist or has been deleted");
                return redirect()->route('admin.currencies.index');
            }

            $currency -> update($request -> all());

            session()->flash('success', 'Currency Updated Successfully');
            return redirect()->route('admin.currencies.index');

        } catch (\Exception $exception ) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');

        } // end of try -> catch

    }// end of update

    public function destroy($id)
    {
        try {
            $currency = Currency::find($id);
            if(!$currency) {
                session()->flash('error', "Currency Doesn't Exist or has been deleted");
                return redirect()->route('admin.currencies.index');
            }

            $currency -> deleteTranslations();
            $currency -> delete();

            session()->flash('success', 'Currency Deleted Successfully');
            return redirect()->route('admin.currencies.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
