<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{ 
    public static function hashPassword($password)
    {
        return Hash::make($password);
    }

    public static function checkPassword($password, $hashPassword)
    {
        return Hash::check($password, $hashPassword);
    }

}
