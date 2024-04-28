<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    protected $guarded = [];

    protected $fillable = ['power', 'date'];

    public function members()
    {
        return $this->belongsTo(Power::class, 'powers_id');
    }
}
