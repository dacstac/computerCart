<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('session/login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('startLogin')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->route("home");
            } else {
                return redirect()->route('startLogin')->withErrors(['credentials' => 'The username or the password are incorrect']);
            }
        }
        return redirect()->route('home');
    }

    public function createAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => ['required', 'unique:users,username', 'alpha_num:ascii', 'between:5,20'],
            'pass' => ['required', 'between:5,20'],
            'email' => ['required', 'unique:users,email'],
            'name' => ['required', 'alpha:ascii'],
            'first_surname' => ['required', 'alpha:ascii'],
            'second_surname' => ['nullable', 'alpha:ascii'],
            'phone' => ['required', 'unique:users,number_phone', 'digits:9'],
            'offers' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('startLogin')
                ->withErrors($validator)
                ->withInput();
        } else {
            User::insert([
                'username' => $request->user,
                'password' => Hash::make($request->pass),
                'email' => $request->email,
                'name' => $request->name,
                'first_surname' => $request->first_surname,
                'second_surname' => $request->second_surname,
                'number_phone' => $request->phone,
                'type' => 1,
                'offers' => isset($request->offers) ? 1 : 0,
            ]);
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function admin()
    {
        return redirect()->route('home');
    }
}
