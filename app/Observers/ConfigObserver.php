<?php

namespace App\Observers;

use App\Models\Config;

class ConfigObserver
{
    public function saved(Config $config)
    {
        \Cache::forget($config->cache_key);
    }

    public function deleted(Config $config)
    {
        \Cache::forget($config->cache_key);
    }
}
