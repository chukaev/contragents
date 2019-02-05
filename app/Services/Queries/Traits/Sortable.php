<?php

namespace App\Services\Queries\Traits;

trait Sortable
{
    private $column;
    private $direction;

    /**
     * Add sorting by given direction to query.
     *
     * @param $query
     * @param $request
     */
    public function sort($query, $request)
    {
        if (!isset($request))
            return;

        $this->column = $request->input('sort_column');
        $this->direction = $request->input('sort_direction');

        if (isset($this->column) && isset($this->direction) && $this->direction != "none")
            $query->orderBy($this->column, $this->direction);
    }
}
