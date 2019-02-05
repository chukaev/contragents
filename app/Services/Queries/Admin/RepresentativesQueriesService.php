<?php

namespace App\Services\Queries\Admin;

use App\Enums\Statuses;
use App\Models\Representative;
use App\Services\Queries\Base\QueriesService;
use App\Traits\Queries\WithoutGlobalScopeActive;

/**
 * Class ProductsQueriesService. Inherited from base QueriesService.
 * Use to perform queries to database.
 *
 * @package App\Services\Queries
 */
class RepresentativesQueriesService extends QueriesService
{
//    use WithoutGlobalScopeActive;

    /**
     * Search in representatives table by given key.
     *
     * @param $key
     */
    public function search($key)
    {
        $query = $this->baseQuery();

        foreach (Representative::getColumnsNames() as $columnsName) {
            $query->orWhere($columnsName, 'like', '%' . $key . '%');
        }

        $searchResult = $query->get();
    }
}