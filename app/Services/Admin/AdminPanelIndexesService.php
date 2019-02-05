<?php

namespace App\Services\Admin;

use App\Traits\Queries\QueriesManager;

class AdminPanelIndexesService
{
    use QueriesManager;

    public function __construct()
    {
        $this->setQueriesManager("Product", "Admin\RepresentativesQueriesService");
    }

    /**
     * Get total count of representatives.
     *
     * @return int $count.
     */
    public function getRepresentativesCount()
    {
        $count = $this->queriesManager->anotherEntity("Representative", "Admin\RepresentativesQueriesService")->count('id');

        return $count;
    }
}