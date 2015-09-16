<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManagedUserRequest;
use App\User;
use Validator;
use Input;
use File;
use DB;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register($username, $key_active){
        $user = new User;
        $user = DB::table('users')->where('username','=', $username)->first();

        if ($user->key_active == $key_active){
            DB::table('users')
            ->where('username','=', $username)
            ->update(['status' => 'active']);
            return Redirect::to('register');
        }
        
    }
}
