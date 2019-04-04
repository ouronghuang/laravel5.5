<?php

namespace App\Models\Traits;

trait HashIdHelper
{
    private $hashId;

    public function getHashIdAttribute()
    {
        if (!$this->hashId) {
            $this->hashId = \Hashids::encode($this->id);
        }

        return $this->hashId;
    }

    public function resolveRouteBinding($value)
    {
        $value = current(\Hashids::decode($value));

        if (!$value) {
            return;
        }

        return parent::resolveRouteBinding($value);
    }

    public function getRouteKey()
    {
        return $this->hash_id;
    }
}
