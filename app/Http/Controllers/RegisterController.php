<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        $store = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>2
        ]);
        if ($store) {
           return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
           } else {
           return redirect()->back()->with('error', 'Register gagal, silahkan coba lagi');

        }
    }
}
