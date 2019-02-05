<?php

namespace App\Services\Queries\Api;

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
	 * @param $keyString
	 * @return array
	 */
	public function searchQuery($keyString)
	{
		$query = $this->baseQuery();

		$keys = explode(" ", $keyString);

		foreach ($keys as $key)
		{
			$query->where(
				function ($queryInner) use ($key)
				{
					foreach (Representative::getColumnsNames() as $columnsName)
					{
						$queryInner->orWhere($columnsName, 'like', '%' . $key . '%');
					}
				}
			);
		}

		$searchResult = $query->get()->toArray();

		return $searchResult;
	}
}