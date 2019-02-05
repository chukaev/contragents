<?php

namespace App\Traits\Queries;

/**
 * Trait QueriesManager, to set queries manager and use $queriesManager variable.
 *
 * @package App\Traits\Frontend
 */
trait QueriesManager
{
    /* Link to any queries service. */
    private $queriesManager;

    /**
     * Assign queries manager service.
     * @param string $modelName
     * @param string $serviceName
     */
    public function setQueriesManager($modelName, $serviceName)
    {
        $this->queriesManager = app()->make('Services\Queries\Base\QueriesService',
            [
                "model" => $modelName,
                "service" => $serviceName
            ]);
    }
}