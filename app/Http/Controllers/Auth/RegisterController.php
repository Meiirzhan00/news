<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function back;
use function redirect;
use function view;

class RegisterController extends Controller
{
    public function index(){

        return view('register');
    }

    public function create(){


    }

    public function store(Request $request){

        if (Auth::check()){

            return redirect()->route('home');
        }

        $attributes = $request->validate([
            'name' => 'required|min:3return)55',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);


        $user = User::create($attributes);

        if ($user){
            Auth::login($user);
            return redirect()->route('home');
        }

        return back()->withErrors([
            'error' => 'An error occurred while saving the user.'
        ]);

    }
}
