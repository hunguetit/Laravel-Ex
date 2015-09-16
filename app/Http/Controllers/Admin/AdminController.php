<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManagedUserRequest;
use App\User;
use App\Categories;
use Validator;
use Input;
use File;
use DB;

class AdminController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    
    public function index(){
        $user = DB::table('users')->get();
        return view('admin.users.users_list', ['users' => $user]);
    }

    public function users_list(){
        $user = DB::table('users')->get();
        return view('admin.users.users_list', ['users' => $user]);
    }

    public function insert(){
        return view('admin.users.insert_users');
    }
    public function profile($id){
        $user = User::find($id);
        return view('admin.users.profile_account',['user'=>$user]);
    }

    public function store(Request $request){
        $input = $request->only('username','name','email', 'password','role');
        $input['password'] = bcrypt($request->password);

        $user = User::create($input);

        $imageName = '';
        $image = $request->file('avatar');
        if($image)
        {
            global $imageName;
            $rand=rand(1,10000);
            $imageName = $rand . '.'. $request->input('username') . '.' .  $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/avatar', $imageName);
        }
        $user->avatar = 'avatar/'.$imageName;

        $user->remember_token = $request->input('_token');
        $user->save();

        return Redirect::to('admin/users_list');
    }



    public function edit($id){
        $user = User::find($id);
        if($user->role == 'admin'){
            return Redirect::to('/admin');
        }
        return view('admin.users.edit_users',['user'=>$user]);
    }

    public function update($id, Request $request ){
        $user = DB::table('users')->where('id','=', $id)->first();
        if($user->role == 'admin'){
            return Redirect::to('/admin');
        }
        
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $imageName = '';
        $image = $request->file('avatar');
        if($image)
        {
            global $imageName;
            $rand=rand(1,10000);
            $imageName = $rand . '.'. $request->input('username') . '.' .  $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/avatar', $imageName);
            $user->avatar = 'avatar/'.$imageName;
        }

        DB::table('users')
            ->where('id','=', $id)
            ->update(['name' => $user->name, 'username' =>$user->username, 'email' => $user->email,'avatar' => $user->avatar]);

        return Redirect::to('admin/users_list');
    }

    public function delete($id){
        $user = User::find($id);
        if($user->role == 'admin'){
            return Redirect::to('/admin');
        }
        $user->delete();
        return Redirect::to('admin/users_list');
    }

    public function chat(){
        return view('admin.pages.chat');
    }
}