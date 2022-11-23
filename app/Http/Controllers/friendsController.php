<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class friendsController extends Controller
{
    public function addFriends($vid, $vid_friend)
    {
        DB::table('friends')->insert([
            'vid' => $vid,
            'vid_friend' => $vid_friend,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Friend Added'
        ]);
    }

    public function removeFriends($vid, $vid_friend)
    {
        DB::table('friends')->where('vid', $vid)->where('vid_friend', $vid_friend)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Friend Removed'
        ]);
    }

    public function getFriends($vid)
    {
        $friends = DB::table('friends')->where('vid', $vid)->get();
        return response()->json($friends);
    }
}
