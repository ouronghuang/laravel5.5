<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,
        Traits\HashIdHelper,
        Traits\LinksHelper,
        HasRoles;

    protected $fillable = [
        'username',
        'nickname',
        'email',
        'password',
        'avatar',
        'introduction',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNicknameAttribute($value)
    {
        return $value ?: $this->username;
    }
}
