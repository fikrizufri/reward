<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;
use App\Traits\HasPermissionsTrait;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable, UsesUuid, HasPermissionsTrait;

    // mengnonaktifkan incrementing
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = array(
        'icon' => "default-icon.png",
    );
}
