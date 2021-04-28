<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:read_users'])->only('index');
        $this -> middleware(['permission:create_users'])->only(['create', 'store']);
        $this -> middleware(['permission:update_users'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_users'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $users = User::whereRoleIs('admin')-> where(function($query) use ($request){
            return $query -> when($request-> search , function ($searchQuery) use ($request) {
                return $searchQuery -> where ('first_name', 'like' , '%' . $request -> search . '%')
                    ->orWhere('last_name', 'like' , '%' . $request -> search . '%');
            });
        })->paginate(PAGINATION_COUNT);

        return view('admin.users.index', compact('users'));
    } // end of index

    public function create()
    {
        return view('admin.users.create');
    } // end of create

    public function store(Request $request)
    {
        $request -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'mimes:jpg,jpeg,png,svg',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1',
        ]);

        $request_data = $request -> except(['password', 'password_confirmation', 'permissions', 'image']);

        $request_data['password'] = bcrypt($request->password);

        if ($request -> image) {
            Image::make($request->image)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/users/'. $request ->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $user = User::create($request_data); // create user
        $user -> attachRole('admin'); // add role to user
        $user -> syncPermissions($request -> permissions); // add permissions to user

        session()->flash('success', 'User Created Successfully');
        return redirect()->route('admin.users.index');
    } // end of store

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    } // end of edit

    public function update(Request $request, User $user)
    {
        $request -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user -> id), ],
            'image' => 'image',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request -> except(['permissions', 'image']);

        if($request->image){
            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/users/' . $user ->image);

            } // end of inner if

            Image::make($request->image)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/'. $request ->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        } // end of outer if

        $user->update($request_data); // update user
        $user -> syncPermissions($request -> permissions); // update permissions to user

        session()->flash('success', 'User Updated Successfully');
        return redirect()->route('admin.users.index');
    } // end of update

    public function destroy(User $user)
    {
        if($user -> image != 'default.png'){
            Storage::disk('public_uploads')->delete('/users/' . $user ->image);
        }
        $user -> delete();
        session()->flash('success', 'User Deleted Successfully');
        return redirect()->route('admin.users.index');

    } // end of destroy

} // end of controller
