<?php

namespace App\Http\Controllers\Auth;

use Recaptcha;
use App\User;
use Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;
use Input;
use OAuth;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Socialite;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'username';
    }

    protected function createKeyActive(){
        $chars = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        $size = strlen($chars);
        $str = "";
        for ($i=0; $i<30; $i++){
            $str .= $chars[rand(0, $size-1)];
        }
        return $str;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required|recaptcha',
            'avatar' => 'required|image|mimes:jpg,jpeg,png,gif|image_size:<=30000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user=new User;
        $user->name= $data['name'];
        $user->username= $data['username'];
        $user->password= bcrypt($data['password']);
        $user->email= $data['email'];
        $user->remember_token= $data['_token'];
        $user->role = "user";
        $user->status = "non-active";

        $key_active = $this->createKeyActive();
        $user->key_active = $key_active;
        
        $imageName = '';
        $image = $data['avatar'];
        if($image)
        {
            global $imageName;
            $rand=rand(1,10000);
            $imageName = $rand . '.'. $data['username'] . '.' .  $image->getClientOriginalExtension();
            $image->move(base_path() . '/public/avatar', $imageName);
        }
        $user->avatar = 'avatar/'.$imageName;
        
        Mail::send('users.mails.welcome', array('name'=>$user->name, 'key_active'=>$user->key_active, 'username'=>$user->username), function($message) use ($user){
            $message->from('hunguetit@gmail.com', 'Bicycle Sport Shop');
            $message->to($user->email, $user->name)->subject('Welcome to Bicycle Sport Shop!');
        });

        $user->save();
        return $user;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::with('facebook')->user();
        dd($user);
        // OAuth Two Providers
        $token = $user->token;

        // OAuth One Providers
        $token = $user->token;
        $tokenSecret = $user->tokenSecret;

        // All Providers
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
    }

    public function loginWithFacebook() {

        // get data from input
        $code = Input::get( 'code' );

        // get fb service
        $fb = OAuth::consumer( 'Facebook' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( 'https://graph.facebook.com/me?fields=id,email,name,gender,birthday,cover,picture'), true );
            //Var_dump
            //display whole array().
            $user = DB::table('users')->where('username','=', $result['id'])->get();
            if (count($user) == 0){

                $user=new User;
                $user->name= $result['name'];
                $user->username= $result['id'];
                $user->password= bcrypt("null");
                $user->email= $result['email'];
                $user->role = "user";
                $user->status = "active";

                $user->save();
            }
            Auth::login($user);
            return Redirect::to('/home');

        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to( (string)$url );
        }
    }
}