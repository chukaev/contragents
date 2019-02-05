<?php

namespace App\Services\Queries\Base;

use App\Enums\Statuses;
use App\Services\Queries\Interfaces\IQuery;
use App\Services\Queries\Traits\Filters;
use App\Services\Queries\Traits\Sortable;
use Illuminate\Database\Query\Builder;

class QueriesService implements IQuery
{
    use Filters, Sortable;
    /**
     * Full model class name.
     *
     * @var
     */
    protected $modelClass;

    /**
     * Count items per page.
     */
    protected $perPage;

    /**
     * QueriesService constructor.
     */
    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;

        /* Set per page rows count, from env config or default value. */
        $this->setRowsCountPerPage();
    }

    /**
     * Set pagination per page rows count.
     */
    public function setRowsCountPerPage()
    {
        $this->perPage = env('ADMIN_PANEL_ROWS_PER_PAGE', 10);
    }

    /**
     * Get all elements from table. Filter if parameters passed.
     *
     * @param bool $paginated
     * @param $request
     * @return object
     */
    public function all($paginated=false, $request=null)
    {
        $query = $this->baseQuery();

        /** Filter data if parameters passed. */
        $this->filter($query, $request);

        /** Sort data if sorting is chosen. */
        $this->sort($query, $request);

        if ($paginated === 'paginate')
            $result = $query->paginate($this->perPage);
        else
            $result = $query->get();

        if (isset($request))
            $result->appends($request->input()); // adds filter params to pagination links

        return $result;
    }

    /**
     * Get all active elements from table.
     *
     * @return object
     */
    public function allActive($paginated=false, $request)
    {
        if ($paginated === 'paginate')
            $result = $this->modelClass::active()->paginate($this->perPage);
        else
            $result = $this->baseQuery()->get();

        return $result;
    }

    /**
     * Get all elements from table with given constraints.
     *
     * @param $condition
     * @param $paginated
     * @return object
     * @internal param $array
     *
     */
    public function allWhere($condition, $paginated=false)
    {
        if ($paginated === 'paginate')
            $result = $this->baseQuery()->where($condition)->paginate($this->perPage);
        else
            $result = $this->baseQuery()->where($condition)->get();

        return $result;
    }

    /**
     * Get all elements from table where column value is in array.
     *
     * @param $condition
     * @param $paginated
     * @return object
     * @internal param $array
     *
     */
    public function allIn($column, $array, $paginated=false)
    {
        if ($paginated === 'paginate')
            $result = $this->baseQuery()->whereIn($column, $array)->paginate($this->perPage);
        else
            $result = $this->baseQuery()->whereIn($column, $array)->get();

        return $result;
    }

    /**
     * Get all elements from table where column value is like given key.
     *
     * @param string $column
     * @param string $key
     * @param string $paginated
     * @return object
     */
    public function allWhereLike($column, $key, $paginated = false)
    {
        if ($paginated === 'paginate') {
            $result = $this->baseQuery()->where($column, 'like', $key)->paginate($this->perPage);
        } else {
            $result = $this->baseQuery()->where($column, 'like', $key)->get();
        }

        return $result;
    }

    /**
     * Get all active elements from table with given constraints.
     *
     * @param $condition
     * @param $paginated
     * @return object
     * @internal param $array
     *
     */
    public function allActiveWhere($condition, $paginated=false)
    {
        if ($paginated === 'paginate')
            $result = $this->modelClass::active()->where($condition)->paginate($this->perPage);
        else
            $result = $this->modelClass::active()->where($condition)->get();

        return $result;
    }

    /**
     * Get single row by id.
     *
     * @param $id
     *
     * @return object.
     */
    public function findItem($id)
    {
        $result = $this->baseQuery()->find($id);

        return $result;
    }

    /**
     * Get single row where given constraints fit.
     *
     * @param $array
     *
     * @return object.
     */
    public function findItemWhere($array)
    {
        $result = $this->baseQuery()->where($array)->first();

        return $result;
    }

    /**
     * Get single active row by id.
     *
     * @return object
     */
    public function findActiveItem($id)
    {
        $result = $this->modelClass::active()->find($id);

        return $result;
    }

    /**
     * Store element in table.
     *
     * @return void
     */
    public function storeItem($array)
    {
        $entity = new $this->modelClass();
        $entity->fill($array);
        $entity->save();

        return $entity;
    }

    /**
     * Update row in table.
     *
     * @return void
     */
    public function updateItem($array)
    {
        $id = $array['id'];

        $entity = $this->findItem($id);
        $entity->fill($array);

        $entity->save();
    }

    /**
     * Delete row in table.
     *
     * @param $id
     *
     * @return void
     */
    public function deleteItem($id)
    {
        $this->baseQuery()->find($id)->delete();
    }

    /**
     * Delete row in table, using constraints.
     *
     * @param array $array
     *
     * @return void
     */
    public function deleteWhere($array)
    {
        $this->baseQuery()->where($array)->delete();
    }

    /**
     * Get max value for column.
     *
     * @param $column
     * @return mixed
     */
    public function max($column)
    {
        return $this->baseQuery()->max($column);
    }

    /**
     * Get count of items.
     *
     * @param $column
     * @return mixed
     */
    public function count($column)
    {
        return $this->baseQuery()->count($column);
    }

    /**
     * Perform queries for another entity.
     *
     * @param string $modelName
     * @param string $serviceName
     * @return object
     */
    public function anotherEntity($modelName, $serviceName)
    {
        /* TODO: consider to move this code to IQuery interface */
        $queriesManager = app()->make('Services\Queries\Base\QueriesService',
            [
                "model" => $modelName,
                "service" => $serviceName
            ]);

        return $queriesManager;
    }

    /**
     * Base query.
     *
     * @return Builder query
     */
    public function baseQuery()
    {
        return $this->modelClass::query();
    }
}