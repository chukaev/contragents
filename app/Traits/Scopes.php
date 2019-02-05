<?php

namespace App\Traits;

use App\Enums\Statuses;

trait Scopes {

    /**
     * Scope queries to get only active records.
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->whereNotIn('status', [Statuses::NOT_ACTIVE]);
    }
}