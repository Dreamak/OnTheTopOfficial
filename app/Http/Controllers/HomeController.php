<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guild;
use App\Models\Event;
use App\Models\Power;
use App\Models\Member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $guild = Guild::with('members')->first();
        $events = Event::whereDate('start_time', '>=', now())->orderBy('start_time')->get(); // Récupère les événements futurs
        $members = Member::all();

        $topMembers = Member::with('power')
        ->join('powers', 'members.powers_id', '=', 'powers.id')
        ->where('members.guilds_id', 1) // Filtrer les membres appartenant à la guilde avec id 1
        ->orderBy('powers.power', 'desc')
        ->take(5)
        ->get();
        

        return view('home', compact('guild', 'events', 'topMembers'));
    }
}
