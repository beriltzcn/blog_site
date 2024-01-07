<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return back()->with('success', 'Register Successfully');

    }

    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $password = $request->input('password');
        $user = User::where('email', $request->email)
            ->first();

        if ($user) {
            if (\Illuminate\Support\Facades\Hash::check($password, $user->password)) {
                auth('web')->login($user);
                return redirect()->route('homepage');
            }
        }
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        auth('web')->logout();
        return redirect()->route('homepage')->with('success','Çıkış başarılı!');
    }
}
