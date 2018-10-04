<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index()
    {

        return view('login');
    }

    public function Signupview()
    {

        return view('signup');
    }

    public function Signup(Request $request)
    {
        $user_name = Input::post('username');
        $email = Input::post('email');
        $password = Input::post('password');

        $Signup = new User();
        $Signup->name = $user_name;
        $Signup->email = $email;
        $Signup->password = $password;
        $data = $Signup->save();
        if ($data > 0) {
            return view('signup')->withErrors('Please give valid details');

        } else {
            return view('login');

        }
    }

    public function Login()
    {

        $email = Input::post('email');
        $password = Input::post('password');

        $Login = User::where('email', $email)->where('password', $password)->first();
        if ($Login) {

            return view('index');
        } else {
            return view('login')->withErrors('Email or Password Not Match!');
        }

    }
}
