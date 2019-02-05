<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApiSearchRequest;
use App\Traits\Queries\QueriesManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepresentativesSearchController extends Controller
{
    use QueriesManager;

    public function __construct()
    {
        $this->setQueriesManager("Representative", "Api\RepresentativesQueriesService");
    }

    /**
     * Search in representatives table, by given key.
     */
    public function search(ApiSearchRequest $request)
    {
        $searchKey = $request->input('key');

        $searchResult = $this->queriesManager->searchQuery($searchKey);

        return $searchResult;
    }
}
