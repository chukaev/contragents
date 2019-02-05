<?php

namespace App\Traits\Queries;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Query\Builder;

trait WithoutGlobalScopeActive
{
    /**
     * Updates base query. Removes global scope from all queries for model.
     *
     * @return Builder query
     */
    public function baseQuery()
    {
        return parent::baseQuery()->withoutGlobalScope(ActiveScope::class);
    }
}