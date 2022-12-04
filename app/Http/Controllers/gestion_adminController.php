<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class gestion_adminController extends Controller
{
    
    public function index()
    {
        $gestion_admin = DB::table('users')->get();
        return view('gestion_adminstrateurs', ['gestion_admin' => $gestion_admin]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required',
            'id_user' => 'required',
            'action' => 'required',
        ]);

        DB::table('gestion_admin')->insert([
            'id_admin' => $request->id_admin,
            'id_user' => $request->id_user,
            'action' => $request->action,
            'date' => now(),
        ]);

        return redirect()->intended('gestion_admin');
    }

    public function get_id(Request $request)
    { 
        $gestion_admin = DB::table('users')->where('id', $request->id)->first();
        return view('gestion_adminstrateurs_users', ['gestion_admin' => $gestion_admin]);
    }

    public function update_admins(Request $request)
    {
       
        $request->validate([
            'id' => 'required',
            'admin' => 'required',
            'lvl' => 'required',
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'level' => $request->lvl,
            'updated_at' => now(),
        ]);

        DB::table('logs')->insert([
            'id_admin' => $request->admin,
            'id_user' => $request->id,
            'action' => 'upadte_users',
            'date' => now(),
        ]);  
        
        
        return view('gestion_adm_rm');
    }
}
