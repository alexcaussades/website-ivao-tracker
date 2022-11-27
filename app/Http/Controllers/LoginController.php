<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PasswordController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class LoginController extends Controller
{
    public function authenticate( Request $request )
    {
        $credentials = $request->only('email', 'password');
        $hashPassword = DB::table('users')->where('email', $credentials['email'])->value('password');
        $checkPassword = PasswordController::checkPassword($credentials['password'], $hashPassword);
        

        if (Auth::attempt($credentials) && $checkPassword) {
            $request->session()->regenerate();
            session(['email' => $credentials['email']]);
            session(["admin"=> DB::table('users')->where('email', $credentials['email'])->value('admin')]);
            session(["level"=> DB::table('users')->where('email', $credentials['email'])->value('level')]);
            session(["vid"=> DB::table('users')->where('email', $credentials['email'])->value('vid')]);
            session(["name"=> DB::table('users')->where('email', $credentials['email'])->value('name')]);
            return redirect()->intended('dashboard');
        }

        return redirect()->intended('login');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }

    public function register( Request $request )
    {   
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $hashPassword = PasswordController::hashPassword($request->password);
        $creatToken = PasswordController::hashPassword($request->email);

        $credentials = $request->only('email', 'password');

        DB::table('users')->insert([
            'name' => $request->email,
            'email' => $request->email,
            'password' => $hashPassword,
            'remember_token' => $creatToken,
            'vid' => null,
            'admin' => 0,
            'level' => 1,
            'created_at' => now(),
        ]);

        if (Auth::attempt($credentials)) {
            //session is started

            return redirect()->intended('dashboard');
        }

        return redirect()->intended('login');
    }
}
