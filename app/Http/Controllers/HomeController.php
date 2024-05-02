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

        // Calculer la somme des puissances pour la guilde avec l'ID 1
        $totalPower = Member::where('guilds_id', 1) // Filtrer les membres appartenant à la guilde avec id 1
                            ->with('power') // Charger les relations de power
                            ->get() // Obtenir tous les membres concernés
                            ->sum(function ($member) { // Calculer la somme des puissances
                                return $member->power ? $member->power->power : 0;
                            });

        $topMembers = Member::with('power')
                            ->join('powers', 'members.powers_id', '=', 'powers.id')
                            ->where('members.guilds_id', 1)
                            ->orderBy('powers.power', 'desc')
                            ->take(5)
                            ->get();

        function formatNumber($num) {
            if($num >= 1000 && $num < 1000000) {
                return number_format($num / 1000, 1, ',', ' ') . ' K';
            } elseif($num >= 1000000 && $num < 1000000000) {
                return number_format($num / 1000000, 1, ',', ' ') . ' M';
            } elseif($num >= 1000000000) {
                return number_format($num / 1000000000, 1, ',', ' ') . ' B';
            } else {
                return number_format($num, 0, ',', ' ');
            }
        }


        $totalPowerFormatted = formatNumber($totalPower);

        return view('home', compact('guild', 'events', 'topMembers', 'totalPowerFormatted'));
    }
}
