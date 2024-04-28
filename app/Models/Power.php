<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    protected $table = 'powers';
    protected $primaryKey = 'id_powers';
    protected $fillable = ['power', 'date'];
    
    public function members()
    {
        return $this->hasMany(Member::class, 'powers_id');
    }
}
