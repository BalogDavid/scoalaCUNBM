<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        //dd (Hash::make(123456));

        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type ==1)
            {
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->user_type ==2)
            {
                return redirect('teacher/dashboard');
            }
            elseif(Auth::user()->user_type ==3)
            {
                return redirect('student/dashboard');
            }
            elseif(Auth::user()->user_type ==4)
            {
                return redirect('parent/dashboard');
            }
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember))
    {
        if(Auth::user()->user_type ==1)
        {
            return redirect('admin/dashboard');
        }
        elseif(Auth::user()->user_type ==2)
        {
            return redirect('teacher/dashboard');
        }
        elseif(Auth::user()->user_type ==3)
        {
            return redirect('student/dashboard');
        }
        elseif(Auth::user()->user_type ==4)
        {
            return redirect('parent/dashboard');
        }

    }
    else
    {
        return redirect()->back()->with('error', 'Please enter correct email and password');
    }

    }

    public function forgotpassword()
    {
        return view('auth.forgotpw');
    }


    public function postforgotpassword(Request $request)
    {
        $user = User::checkEmail($request->email);
        if(!empty($user))
        {
            $user->remember_token= Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('error', "Daca datele au fost scrise correct vei primii un email!");
        }
        else
        {
            return redirect()->back()->with('error', "Daca datele au fost scrise correct vei primii un email!");
        }
    }

    public function reset($remember_token)
    {
        $user = User::checkToken($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.resetpw',$data);
        }
        else
        {
            abort(404);
        }

    }

    public function postreset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user = User::checkToken($token);
            $user->password = Hash::make($request->password);
            $user->remember_token= Str::random(30);
            $user->save();

            return redirect(url(''))->with('succes', "Parola a fost schimbata!");
        }
        else
        {
            return redirect()->back()->with('error', "Parola si confirmare parolei sunt diferite!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
