<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guild;
use App\Models\Event;

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

        return view('home', compact('guild', 'events'));


        return view('home', compact('guild'));
    }
}
