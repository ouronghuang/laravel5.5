<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'display_name',
        'name',
        'value',
    ];

    public $cache_key = 'configs_all_cached';

    protected $cache_expire_in_minutes = 1440;

    public function getAllCached()
    {
        return \Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function () {
            return $this->all();
        });
    }
}
