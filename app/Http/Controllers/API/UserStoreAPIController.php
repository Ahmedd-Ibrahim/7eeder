<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserStoreAPIRequest;
use App\Http\Requests\API\UpdateUserStoreAPIRequest;
use App\Models\Store;
use App\Models\UserStore;
use App\Repositories\UserStoreRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use phpDocumentor\Reflection\Types\Resource_;
use Response;
use JWTAuth;

/**
 * Class UserStoreController
 * @package App\Http\Controllers\API
 */

class UserStoreAPIController extends AppBaseController
{
    /** @var  UserStoreRepository */
    private $userStoreRepository;

    public function __construct(UserStoreRepository $userStoreRepo)
    {
        $this->userStoreRepository = $userStoreRepo;
    }

    /**
     * Display a listing of the UserStore.
     * GET|HEAD /userStores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userStores = $this->userStoreRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        $user = JWTAuth::parseToken()->authenticate();
        $stores =  $user->Stores()->paginate(10);  // favourite Stores
        return $this->sendResponse($stores, 'User Stores retrieved successfully');
    }

    /**
     * Store a newly created UserStore in storage.
     * POST /userStores
     *
     * @param CreateUserStoreAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserStoreAPIRequest $request)
    {

        $input = $request->all();
        $user = JWTAuth::parseToken()->authenticate();
        $input['user_id'] = $user->id;
        $store = Store::findOrFail( $input['store_id']);
        $userStore = $this->userStoreRepository->create($input);
        return $this->sendResponse($store, 'User Store saved successfully');
    }

    /**
     * Display the specified UserStore.
     * GET|HEAD /userStores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserStore $userStore */
        $userStore = $this->userStoreRepository->find($id);

        if (empty($userStore)) {
            return $this->sendError('User Store not found');
        }

        return $this->sendResponse($userStore->toArray(), 'User Store retrieved successfully');
    }

    /**
     * Update the specified UserStore in storage.
     * PUT/PATCH /userStores/{id}
     *
     * @param int $id
     * @param UpdateUserStoreAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserStoreAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserStore $userStore */
        $userStore = $this->userStoreRepository->find($id);

        if (empty($userStore)) {
            return $this->sendError('User Store not found');
        }

        $userStore = $this->userStoreRepository->update($input, $id);

        return $this->sendResponse($userStore->toArray(), 'UserStore updated successfully');
    }

    /**
     * Remove the specified UserStore from storage.
     * DELETE /userStores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserStore $userStore */
        $userStore = $this->userStoreRepository->find($id);

        if (empty($userStore)) {
            return $this->sendError('User Store not found');
        }
        $userStore->delete();
        return $this->sendSuccess('User Store deleted successfully');
    }
}
