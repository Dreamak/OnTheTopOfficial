<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $fillable = ['ingame_name', 'powers_id', 'guilds_id'];

    public function guild()
    {
        return $this->belongsTo(Guild::class, 'guilds_id');
    }

    public function power()
    {
        return $this->belongsTo(Power::class, 'powers_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'members_id');
    }
}
