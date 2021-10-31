<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        if ($request->method() == 'GET') {
            return view('login');
        } elseif ($request->method() == 'POST') {
            //dd($request->only(['name', 'email', 'password']));
            $formfields = $request->only(['name', 'email', 'password']);
            if (Auth::attempt($formfields)) {
                return redirect('/'); //->with(['succes', true]);
            }
        }
        // если не получилось войти
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
