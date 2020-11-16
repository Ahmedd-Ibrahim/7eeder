<?php

namespace App\Http\Controllers;

use App\DataTables\UserStoreDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserStoreRequest;
use App\Http\Requests\UpdateUserStoreRequest;
use App\Repositories\UserStoreRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UserStoreController extends AppBaseController
{
    /** @var  UserStoreRepository */
    private $userStoreRepository;

    public function __construct(UserStoreRepository $userStoreRepo)
    {
        $this->userStoreRepository = $userStoreRepo;
    }

    /**
     * Display a listing of the UserStore.
     *
     * @param UserStoreDataTable $userStoreDataTable
     * @return Response
     */
    public function index(UserStoreDataTable $userStoreDataTable)
    {

        return $userStoreDataTable->render('user_stores.index');
    }

    /**
     * Show the form for creating a new UserStore.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_stores.create');
    }

    /**
     * Store a newly created UserStore in storage.
     *
     * @param CreateUserStoreRequest $request
     *
     * @return Response
     */
    public function store(CreateUserStoreRequest $request)
    {
        $input = $request->all();

        $userStore = $this->userStoreRepository->create($input);

        Flash::success('User Store saved successfully.');

        return redirect(route('userStores.index'));
    }

    /**
     * Display the specified UserStore.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userStore = $this->userStoreRepository->find($id);

        if (empty($userStore)) {
            Flash::error('User Store not found');

            return redirect(route('userStores.index'));
        }

        return view('user_stores.show')->with('userStore', $userStore);
    }

    /**
     * Show the form for editing the specified UserStore.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userStore = $this->userStoreRepository->find($id);

        if (empty($userStore)) {
            Flash::error('User Store not found');

            return redirect(route('userStores.index'));
        }

        return view('user_stores.edit')->with('userStore', $userStore);
    }

    /**
     * Update the specified UserStore in storage.
     *
     * @param  int              $id
     * @param UpdateUserStoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserStoreRequest $request)
    {
        $userStore = $this->userStoreRepository->find($id);

        if (empty($userStore)) {
            Flash::error('User Store not found');

            return redirect(route('userStores.index'));
        }

        $userStore = $this->userStoreRepository->update($request->all(), $id);

        Flash::success('User Store updated successfully.');

        return redirect(route('userStores.index'));
    }

    /**
     * Remove the specified UserStore from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userStore = $this->userStoreRepository->find($id);

        if (empty($userStore)) {
            Flash::error('User Store not found');

            return redirect(route('userStores.index'));
        }

        $this->userStoreRepository->delete($id);

        Flash::success('User Store deleted successfully.');

        return redirect(route('userStores.index'));
    }
}
