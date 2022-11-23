<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class atc extends Controller
{
    public function index()
    {
        return view('atc');
    }

    public function show($vid)
    {
        $atc = DB::table('atc')->where('vid', $vid)->get();
        return response()->json($atc);
    }

   

    public function store(Request $request, $vid )
    {
        DB::table('atc')->insert([
            'vid' => $vid,
            'callsign' => $request->callsign ?? "TEST",
            'frequency' => $request->frequency ?? "TEST",
            'position' => $request->facility ?? "TEST",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'vid' => $vid,
            'callsign' => $request->callsign,
            'position' => $request->position,
            'frequency' => $request->frequency,
        ]);
    } 
    
    public function delect($vid, $id)
    {
        DB::table('atc')->where('vid', $vid)->where('id', $id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'ATC Deleted'
        ]);
    }
}
