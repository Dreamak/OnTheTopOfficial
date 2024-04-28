<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['email', 'username', 'passwords_id', 'members_id', 'roles_id'];


    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function hasRole($roleName)
    {
        return $this->role->name === $roleName;
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'members_id');
    }

    public function passwordRecord()
    {
        return $this->belongsTo(Password::class, 'passwords_id', 'id');
    }

}
