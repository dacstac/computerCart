<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/createUsers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'unique:users,username', 'alpha_num:ascii', 'between:5,20'],
            'password' => ['required', 'between:5,20'],
            'email' => ['required', 'unique:users,email', 'email:rfc,dns'],
            'name' => ['required', 'alpha:ascii'],
            'first_surname' => ['required', 'alpha:ascii'],
            'second_surname' => ['nullable', 'alpha:ascii'],
            'phone' => ['required', 'unique:users,number_phone', 'digits:9'],
            'type' => ['required'],
            'offers' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('createUsers')
                ->withErrors($validator)
                ->withInput();
        } else {
            User::insert([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'name' => $request->name,
                'first_surname' => $request->first_surname,
                'second_surname' => isset($request->second_surname) ? $request->second_surname : '',
                'number_phone' => $request->phone,
                'type' => $request->type,
                'offers' => isset($request->offers) ? 1 : 0,
            ]);
        }
        return redirect()->route('showUsers');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin/showUsers');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('showUsers');
    }
}
