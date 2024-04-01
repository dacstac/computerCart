<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('profile/profile', compact('user'));
    }

    public function createAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => ['required', 'unique:users,username', 'alpha_num:ascii', 'between:5,20'],
            'pass' => ['required', 'between:5,20'],
            'email' => ['required', 'unique:users,email', 'email:rfc,dns'],
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
                'second_surname' => isset($request->second_surname) ? $request->second_surname : '',
                'number_phone' => $request->phone,
                'type' => 1,
                'offers' => isset($request->offers) ? 1 : 0,
            ]);
        }
        return redirect()->route('home');
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', $request->username != auth()->user()->username ? 'unique:users,username' : '', 'alpha_dash:ascii', 'between:5,20'],
            'email' => ['required', $request->email != auth()->user()->email ? 'unique:users,email' : '', 'email:rfc,dns'],
            'name' => ['required', 'alpha:ascii'],
            'first_surname' => ['required', 'alpha:ascii'],
            'second_surname' => ['nullable', 'alpha:ascii'],
            'phone' => ['required', $request->phone != auth()->user()->number_phone ? 'unique:users,number_phone' : '', 'digits:9'],
            'offers' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile')
                ->withErrors($validator)
                ->withInput();
        } else {
            User::where('id', auth()->user()->id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'name' => $request->name,
                'first_surname' => $request->first_surname,
                'second_surname' => $request->second_surname,
                'number_phone' => $request->phone,
            ]);
        }
        return redirect()->route('profile');
    }
}
