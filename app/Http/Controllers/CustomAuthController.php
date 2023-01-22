<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomAuthController extends Controller
{
    public function home(){
        return view('admin.homepage');
    }

    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('message', 'signed in!!');
        }
        return redirect('/login')->with('message','login details are not valid !!');
    }

    public function signup(){
        return view('admin.register');
    }

    public function signupsave(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect('dashboard');
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

   public function dashboard(){
    if(Auth::check()){
        return view('admin.dashboard');
    }
    return redirect('/login');
   }

   public function signout(){
    Session::flush();
    Auth::logout();

    return redirect('/login');
   }
}
