<?php

namespace App\Services\Frontend;

use App\Traits\Queries\QueriesManager;

class CatalogsService
{
    use QueriesManager;

    public $catalogsWithProducts;

    public function __construct()
    {
        $this->setQueriesManager("Catalog", "Frontend\CatalogsQueriesService");

        $this->setCatalogsWithProducts();
    }

    /**
     * Get all catalogs.
     */
    public function getTopLevel()
    {
        $catalogs = $this->queriesManager->getTopLevel();

        return $catalogs;
    }

    // TODO: add to cache
    public function setCatalogsWithProducts()
    {
        $this->catalogsWithProducts = $this->queriesManager->getCatalogsWithProducts();
    }

    public function getCatalogsWithProducts()
    {
        return $this->catalogsWithProducts;
    }

    /**
     * Get all products for given catalog.
     *
     * @param $catalogId
     * @return array
     */
    public function getProductsByCatalog($catalogId)
    {
        $productsByCatalogs = [];

        foreach ($this->catalogsWithProducts as $topLevelCatalogs) {
            foreach ($topLevelCatalogs['children'] as $secondLevel) {
                if ($secondLevel['id'] == $catalogId)
                    foreach ($secondLevel['children'] as $thirdLevel) {
                        if (count($thirdLevel['products']) > 0) {
                            $thirdLevel['products']['supplier'] = $productsByCatalogs = array_merge($productsByCatalogs, $thirdLevel['products']);
                        }
                    }
            }
        }

        return $productsByCatalogs;
    }

    /**
     * Get all products by top level catalog.
     *
     * @param $catalogId
     * @return array
     */
    public function getProductsByTopLevelCatalogs()
    {
        $catalogs = [];

        foreach ($this->catalogsWithProducts as $topLevelCatalogs) {
            $productsByTopLevelCatalog = [];
            foreach ($topLevelCatalogs['children'] as $secondLevel) {
                foreach ($secondLevel['children'] as $thirdLevel) {
                    if (count($thirdLevel['products']) > 0) {
                        $productsByTopLevelCatalog = array_merge($productsByTopLevelCatalog, $thirdLevel['products']);
//                        dd($productsByTopLevelCatalog);
                    }
                }
            }

            $catalogs[$topLevelCatalogs['name']] = $productsByTopLevelCatalog;

        }

        return $catalogs;
    }
}