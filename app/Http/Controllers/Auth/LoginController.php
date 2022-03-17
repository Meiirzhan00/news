<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function back;
use function redirect;
use function view;

class LoginController extends Controller
{

    public function index()
    {
        if (Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function store(Request $request){

        if (Auth::check()){

            return redirect('/');
        }
        $check = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($check)){

            return redirect()->route('home')->with('success','Welcome Back');
        }

        return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy(){

        Auth::logout();
        return redirect('/')->with('success','Goodbye!');
    }
}
