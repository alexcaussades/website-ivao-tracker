<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class friendsController extends Controller
{
    public function addFriends($vid, $vid_friend)
    {
        $friends = new friends();
        $friends->vid = $vid;
        $friends->vid_friend = $vid_friend;
        $friends->save();
        return redirect()->route('atc.view', ['vid' => $vid]);
    }
}
