<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Hash;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $user = User::find($id);
        return view('users.pages.profile_account#tab_1_1', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.pages.profile_account#tab_1_2',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $user = DB::table('users')->where('id','=', $id)->first();

        if (($user->username == $request->input('username')) && ($user->email == $request->input('email'))){
            return view('users.pages.profile_account#tab_1_1',['user'=>$user]);
        } else {
            if ($user->username == $request->input('username')){
                $user->name = $request->input('name');
                $user->email = $request->input('email');

                $rules = [
                    'username' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users'
                ];
                $validator = Validator::make(array('name'=>$request->input('name'), 'email' => $request->input('email')), $rules);

                if($validator->passes()){
                    DB::table('users')
                    ->where('id','=', $id)
                    ->update(['name' => $user->name, 'email' => $user->email]);

                    return view('users.pages.profile_account#tab_1_1',['user'=>$user]); 
                } else {
                    return view('users.pages.profile_account#tab_1_2',['user'=>$user])
                        ->withErrors($validator);
                }
            } else {
                if ($user->email == $request->input('email')){
                    $user->username = $request->input('username');
                    $user->name = $request->input('name');


                    $rules = [
                        'username' => 'required|max:255|unique:users',
                        'name' => 'required|max:255|min:3'
                    ];
                    $validator = Validator::make(array('username' => $request->input('username'), 'name' => $request->input('name')), $rules);

                    if($validator->passes()){
                        DB::table('users')
                        ->where('id','=', $id)
                        ->update(['username' =>$user->username, 'name' => $user->name]);

                        return view('users.pages.profile_account#tab_1_1',['user'=>$user]);
                    } else {
                        return view('users.pages.profile_account#tab_1_2',['user'=>$user])
                            ->withErrors($validator);
                    }
                }
            }
        }
    }

    public function edit_avatar($id)
    {
        $user = User::find($id);
        return view('users.pages.profile_account#tab_1_3',['user'=>$user]);
    }

    public function update_avatar($id, Request $request ){
        $user = DB::table('users')->where('id','=', $id)->first();
        
        $imageName = '';
        $image = $request->file('avatar');
        $rules = ['image' => 'required|image|mimes:jpg,jpeg,png,gif|image_size:<=30000'];
        $validator = Validator::make(array('image'=> $image), $rules);
        if($validator->passes()){
            global $imageName;
            $rand=rand(1,10000);
            $imageName = $rand . '.'. $request->input('username') . '.' .  $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/avatar', $imageName);
            $user->avatar = 'avatar/'.$imageName;

            DB::table('users')
            ->where('id','=', $id)
            ->update(['avatar' => $user->avatar]);

            return view('users.pages.profile_account#tab_1_1',['user'=>$user]);
        } else {
            return view('users.pages.profile_account#tab_1_3',['user'=>$user])
                ->withErrors($validator);
        }
    }

    public function edit_password($id)
    {
        return view('users.pages.profile_account#tab_1_4');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function update_password($id, Request $request ){
        $user = DB::table('users')->where('id','=', $id)->first();

        
        if (Hash::check($request->input('old_password'), $user->password)) {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return redirect('profile_password')
                        ->withErrors($validator);
            } else {
                DB::table('users')
                    ->where('id','=', $id)
                    ->update(['password' => bcrypt($request->input('password'))]);
                return redirect('profile_password')
                        ->withErrors("The password had been changed");
           }
        } else {
            return redirect('profile_password')
                        ->withErrors("The current password does not correct");
        }
    }
    public function destroy($id)
    {
        //
    }
}

