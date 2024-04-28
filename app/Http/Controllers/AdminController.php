<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use App\Models\Member;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $guilds = Guild::all();
        $members = Member::all();
        return view('admin.dashboard', compact('guilds', 'members'));
    }
}
