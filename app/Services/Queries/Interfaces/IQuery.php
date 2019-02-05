<?php

namespace App\Services\Queries\Interfaces;

/**
 * Interface IQuery.
 */
interface IQuery
{
    /**
     * Get all elements from table.
     *
     * @return object
     */
    public function all($paginated, $request);

    /**
     * Get all active elements from table.
     *
     * @return object
     */
    public function allActive($paginated, $request);

    /**
     * Get all elements from table with given constraints.
     *
     * @param $condition
     * @param $paginated
     * @return object
     */
    public function allWhere($condition, $paginated);

    /**
     * Get all elements from table where column value is in array.
     *
     * @param $column
     * @param $array
     * @param $paginated
     * @return object
     */
    public function allIn($column, $array, $paginated);

    /**
     * Get all elements from table where column value is like given key.
     *
     * @param string $column
     * @param string $key
     * @param string $paginated
     * @return object
     */
    public function allWhereLike($column, $key, $paginated);

    /**
     * Get all active elements from table with given constraints.
     *
     * @param $condition
     * @param $paginated
     * @return object
     */
    public function allActiveWhere($condition, $paginated);

    /**
     * Get single row by id.
     *
     * @return object
     */
    public function findItem($id);

    /**
     * Get single row where given constraints fit.
     *
     * @return object
     */
    public function findItemWhere($array);

    /**
     * Get single active row by id.
     *
     * @return object
     */
    public function findActiveItem($id);

    /**
     * Store element in table.
     *
     * @return void
     */
    public function storeItem($array);

    /**
     * Update row in table.
     *
     * @return void
     */
    public function updateItem($array);

    /**
     * Delete row in table.
     *
     * @param $id
     *
     * @return void
     */
    public function deleteItem($id);

    /**
     * Delete row in table, using constraints
     *
     * @param array $array
     *
     * @return void
     */
    public function deleteWhere($array);

    /**
     * Get count of products, if parameters passes use constraints.
     *
     * @param $array
     * @return mixed
     */
    public function count($array);

    /**
     * Get base query with model.
     * @return mixed
     */
    public function baseQuery();
}