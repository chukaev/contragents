<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Queries\QueriesManager;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    use QueriesManager;

    public function __construct()
    {
        $this->setQueriesManager("Country", "Admin\CountriesQueriesService");
    }

    /**
     * Show all countries.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $countries = $this->queriesManager->all('paginate', $request);

        if ($request->ajax()) {
            return view('admin.partials.countries', ['countries' => $countries])->render();
        }

        return view('admin.countries.index', [
            'countries' => $countries,
        ]);
    }

    /**
     * Create product page.
     *
     *  @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Edit product page.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = $this->queriesManager->findItem($id);
        $catalogs = $this->queriesManager->anotherEntity("Catalog", "Admin\CatalogsQueriesService")->all();
        $countries = $this->queriesManager->anotherEntity("Country", "Admin\CountriesQueriesService")->all();
        $users = $this->queriesManager->anotherEntity("User", "Admin\UsersQueriesService")->all();

        return view('admin.countries.edit', [
            'editItem' => $product,
            'catalogs' => $catalogs,
            'countries' => $countries,
            'users' => $users
        ]);
    }

    /**
     * Save new catatalog to database.
     *
     * @param CatalogStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->queriesManager->storeItem($request->all());

        return redirect()->route('admin_countries_all');
    }

    public function update(Request $request)
    {
        $this->queriesManager->updateItem($request->all());

        return redirect()->route('admin_countries_all');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $this->queriesManager->deleteItem($id);

            return redirect()->back();
        } catch (\Exception $exception) {
            // TODO: добавить
        }
    }
}
