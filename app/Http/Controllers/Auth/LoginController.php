<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/perfil';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userGoogle = Socialite::driver('google')->user();

        //busco al usuario usando el modelo con lo que viene de $user->email
        $user = User::where('email', $userGoogle->email)->first();

        //si no esta lo registro
        if(!$user) {
          $userFullName = explode(' ', $userGoogle->name);

          $user = new User;
          $user->email = $userGoogle->email;
          $user->name = $userFullName[0];
          $user->password = Hash::make($this->generateRandomString(20));
          $user->avatar = 'default.jpg';

          if($userFullName[1]) {
            $user->surname = $userFullName[1];
          } else {
            $user->surname = 'No especificado';
          }

          $user->save();
        }

       //lo logeo
       \Auth::login($user);

       //luego redirijo hacio donde quiera
       return redirect('/perfil');
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
