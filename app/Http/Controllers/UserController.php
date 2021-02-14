<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $title = "Users List";
        $users = User::orderBy('id','ASC')->paginate(5);

        return view('users.index', compact('title','users'));
    }

    public function create()
    {
        $title = "Add Users";
        $roles = Role::all();
        return view('users.create', compact('title','roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $title = "Edit User : ". $user->name;
        $roles = Role::pluck('name','id')->all();
        $userRole = $user->roles->pluck('id')->all();
        // dd($userRole);
        // dd($roles);


        return view('users.edit', compact('title','user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:password_confirmation',
            'roles' => 'required'
        ]);

        $data = $request->all();
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            $data = Arr::except($data, array('password'));
        }

        $user = User::find($id);
        $user->update($data);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User edited successfully');

    }

    public function destroy($id)
    {
        // dd('ok');
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');

    }
}
