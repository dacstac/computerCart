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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
