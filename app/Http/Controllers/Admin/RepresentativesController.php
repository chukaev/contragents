<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Queries\QueriesManager;
use Illuminate\Http\Request;

class RepresentativesController extends Controller
{
    use QueriesManager;

    public function __construct()
    {
        $this->setQueriesManager("Representative", "Admin\RepresentativesQueriesService");
    }

    /**
     * Show all representatives.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $representatives = $this->queriesManager->all('paginate', $request);

        if ($request->ajax()) {
            return view('admin.partials.representatives', ['representatives' => $representatives])->render();
        }

        return view('admin.representatives.index', [
            'representatives' => $representatives,
        ]);
    }

    /**
     * Create product page.
     *
     *  @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.representatives.create');
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

        return view('admin.representatives.edit', [
            'editItem' => $product,
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

        return redirect()->route('admin_representatives_all');
    }

    public function update(Request $request)
    {
        $this->queriesManager->updateItem($request->all());

        return redirect()->route('admin_representatives_all');
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
