<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class authController extends Controller
{
  // AUTHENTICATION
  function showRegister()
  {
    return view('Auth.Register');
  }

  function registerUser(Request $request)
  {

    $request->validate([
      'name' => 'required|string',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:3|max:5'
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)

    ]);
    return redirect()->route('LoginForm')->with('success', $request->name . ' you have Succesfully Register');
  }

  function showlogin()
  {
    return view('Auth.login');
  }

  function LoginUser(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:3|max:5'
    ]);


    $user = User::where('email', $request->email)->first();
    
    if (!$user) {
      return back()->withErrors([
        'email' => 'invalid Email'
      ])->withInput();
    }

    if (!Hash::check($request->password, $user->password)) {
      return back()->withErrors([
        'password' => 'invalid Password'
      ])->withInput();
    }

    Auth::login($user);
     $request->session()->regenerate();
    return redirect()->route('Homepage')->with('success', $user->name . ' you have Succesfully Login');
  
  }

  function logout()
  {
    Auth::logout();
    return redirect()->route('Homepage');
  }
}
