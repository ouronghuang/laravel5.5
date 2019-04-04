<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $casts = [
        'children' => 'json',
    ];
}
