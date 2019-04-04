<?php

namespace App\Models\Traits;

trait LinksHelper
{
    public function getShowAttribute()
    {
        $link = null;

        if (\Route::has($route = model_plural_name($this) . '.show')) {
            $link = route($route, $this);
        }

        return $link;
    }

    public function getEditAttribute()
    {
        $link = null;

        if (\Route::has($route = model_plural_name($this) . '.edit')) {
            $link = route($route, $this);
        }

        return $link;
    }

    public function getUpdateAttribute()
    {
        $link = null;

        if (\Route::has($route = model_plural_name($this) . '.update')) {
            $link = route($route, $this);
        }

        return $link;
    }

    public function getDestroyAttribute()
    {
        $link = null;

        if (\Route::has($route = model_plural_name($this) . '.destroy')) {
            $link = route($route, $this);
        }

        return $link;
    }
}
