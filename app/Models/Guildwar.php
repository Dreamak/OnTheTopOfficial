<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guildwar extends Model
{
    protected $table = 'guild_wars';

    protected $fillable = [
        'date',
        'result',
        'image',
        'enemy_id_1',
        'enemy_id_2',
        'enemy_id_3',
        'onthetop' // Assurez-vous que ces champs correspondent à votre structure de base de données
    ];
    public function onthetopGuild()
    {
        return $this->belongsTo(Guild::class, 'onthetop');
    }

    public function enemy1()
    {
        return $this->belongsTo(Guild::class, 'enemy_id_1');
    }

    public function enemy2()
    {
        return $this->belongsTo(Guild::class, 'enemy_id_2');
    }

    public function enemy3()
    {
        return $this->belongsTo(Guild::class, 'enemy_id_3');
    }
}
