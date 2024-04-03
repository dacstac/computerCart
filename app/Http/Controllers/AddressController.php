<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $address = Address::where('user_id', auth()->user()->id)->exists() ? Address::where('user_id', auth()->user()->id)->get() : null;
        return view('profile/address', compact(['user', 'address']));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => ['required', 'max:50'],
            'cp' => ['required', 'numeric', 'digits:5'],
            'city' => ['required', 'regex:/^[A-Za-z\s]*$/'],
            'province' => ['required', 'regex:/^[A-Za-z\s]*$/'],
            'country' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('address')
                ->withErrors($validator)
                ->withInput();
        } else {
            Address::insert([
                'address' => $request->address,
                'cp' => $request->cp,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect()->route('address');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'address_edit' => ['required', 'max:50'],
            'cp_edit' => ['required', 'numeric', 'digits:5'],
            'city_edit' => ['required', 'regex:/^[A-Za-z\s]*$/'],
            'province_edit' => ['required', 'regex:/^[A-Za-z\s]*$/'],
            'country_edit' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('address')
                ->withErrors($validator)
                ->withInput();
        } else {
            Address::where('id', $id)->update([
                'address' => $request->address_edit,
                'cp' => $request->cp_edit,
                'city' => $request->city_edit,
                'province' => $request->province_edit,
                'country' => $request->country_edit,
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect()->route('address');
    }

    public function destroy($id)
    {
        Address::where('id', $id)->delete();
        return redirect()->route('address');
    }

    public function dataAddress(Request $request)
    {
        return Address::where('id', $request->id)->get();
    }
}
