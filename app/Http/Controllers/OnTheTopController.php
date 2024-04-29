<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guild;
use App\Models\Member;
use App\Models\Power;

class OnTheTopController extends Controller
{
    public function dashboard()
    {
        $guilds = Guild::all();
        $members = Member::all();
        return view('onthetop.dashboard' , compact('guilds', 'members'));
    }

}
