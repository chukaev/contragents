<?php

namespace App\Services\Queries\Admin;
use App\Enums\Statuses;
use App\Services\Queries\Base\QueriesService;
use App\Traits\Queries\WithoutGlobalScopeActive;

/**
 * Class ProductsQueriesService. Inherited from base QueriesService.
 * Use to perform queries to database.
 *
 * @package App\Services\Queries
 */
class CountriesQueriesService extends QueriesService
{
    use WithoutGlobalScopeActive;

    /**
     * Update row in table. Ovverided to handle input checkbox for column status.
     *
     * @return void
     */
    public function updateItem($array)
    {
        $id = $array['id'];

        $entity = $this->baseQuery()->find($id);
        $entity->fill($array);

        if ($entity->status === "on") {
            $entity->status = Statuses::ACTIVE;
        } else {
            $entity->status = Statuses::NOT_ACTIVE;
        }

        $entity->save();
    }
}