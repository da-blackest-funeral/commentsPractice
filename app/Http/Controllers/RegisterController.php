<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        if ($request->method() == 'POST') {
            $validatedFields = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);
            if (User::where('email', $validatedFields['email'])
                ->exists()) {
               return redirect('/registration')
                   ->withErrors(['login' => 'Такой пользователь уже зарегистрирован']);
            }

            $user = User::create($validatedFields);

            if ($user) {
                Auth::login($user);
                return redirect('/');
            }
            return redirect('/registration')->withErrors([
                'formError' => 'Произошла ошибка при регистрации пользователя'
            ]);

        } elseif ($request->method() == 'GET') {
            return view('registration');
        }
    }
}
