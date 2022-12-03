<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class logsController extends Controller
{
    public function index()
    {
        $logs = DB::table('logs')->get();
        return view('logs', ['logs' => $logs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required',
            'id_user' => 'required',
            'action' => 'required',
        ]);

        DB::table('logs')->insert([
            'id_admin' => $request->id_admin,
            'id_user' => $request->id_user,
            'action' => $request->action,
            'date' => now(),
        ]);

        return redirect()->intended('logs');
    }

    public function joinTable()
    {
        $logs = DB::table('logs')
            ->join('users', 'logs.id_user', '=', 'users.id')
            ->select('logs.*', 'users.name')
            ->get();
        return view('logs', ['logs' => $logs]);
    }
}
