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

        $totalPower = Member::where('guilds_id', 1) // Filtrer les membres appartenant à la guilde avec id 1
        ->with('power') // Charger les relations de power
        ->get() // Obtenir tous les membres concernés
        ->sum(function ($member) { // Calculer la somme des puissances
            return $member->power ? $member->power->power : 0;
        });

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

        return view('onthetop.dashboard' , compact('guilds', 'members', 'totalPowerFormatted'));
    }

}
