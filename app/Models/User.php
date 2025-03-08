<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class User extends Authenticatable
{
    use Notifiable, DefaultDatetimeFormat;

    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    public function allPermissions()
    {
        return collect(); 
    }

    public function isAdministrator()
    {
        return true; // Allows the user to access everything
    }
}
