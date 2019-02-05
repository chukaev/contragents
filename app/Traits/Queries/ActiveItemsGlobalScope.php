<?php

namespace App\Traits\Queries;

use App\Models\Scopes\ActiveScope;

/**
 * Trait ActiveGlobalScope. To add global scope to model.
 */
trait ActiveItemsGlobalScope
{
    // TODO: boot should not be used in trait, more than one trait may be needed
    /* Adding global queries scope for model */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }
}