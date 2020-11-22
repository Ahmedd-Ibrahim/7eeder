<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStoreAPIRequest;
use App\Http\Requests\API\UpdateStoreAPIRequest;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Repositories\StoreRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;
use Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class StoreController
 * @package App\Http\Controllers\API
 */

class StoreAPIController extends AppBaseController
{
    /** @var  StoreRepository */
    private $storeRepository;

    public function __construct(StoreRepository $storeRepo)
    {
        $this->storeRepository = $storeRepo;
        $this->middleware('user.role:admin-moderator',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the Store.
     * GET|HEAD /stores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stores = $this->storeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

       $storeData = Store::paginate(3);
       $success = true;
       $message = 'Stores retrieved successfully';
//StoreResource::collection(Store::all())
        return response()->json(compact('success','storeData','message'),200);
//        return $this->sendResponse( $storeData , 'Stores retrieved successfully');
    }

    /**
     * Store a newly created Store in storage.
     * POST /stores
     *
     * @param CreateStoreAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStoreAPIRequest $request)
    {
        $input = $request->all();
        $user = JWTAuth::parseToken()->authenticate();
        $input['active'] ='active'; // default active
        $input['user_id'] = $user->id;
        $store = $this->storeRepository->create($input);
        return $this->sendResponse($store->toArray(), 'Store saved successfully');
    }

    /**
     * Display the specified Store.
     * GET|HEAD /stores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Store $store */
        $storeToView = $this->storeRepository->find($id);

        if (empty($storeToView)) {
            return $this->sendError('Store not found');
        }

        /* Counter */
        if ($user = JWTAuth::parseToken()->authenticate())
        {
            $storeToView->UserViews()->syncWithoutDetaching($user);
            $storeToView->views = count($storeToView->UserViews);
            $storeToView->save();
        }
        /* / Counter */
        $data = Store::with('MeetTypes')->find($storeToView->id);
//        $data->toArray()

        return $this->sendResponse($data, 'Store retrieved successfully');
    }

    /**
     * Update the specified Store in storage.
     * PUT/PATCH /stores/{id}
     *
     * @param int $id
     * @param UpdateStoreAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoreAPIRequest $request)
    {
        $input = $request->all();

        /** @var Store $store */
        $store = $this->storeRepository->find($id);

        if (empty($store)) {
            return $this->sendError('Store not found');
        }

        $store = $this->storeRepository->update($input, $id);

        return $this->sendResponse($store->toArray(), 'Store updated successfully');
    }

    /**
     * Remove the specified Store from storage.
     * DELETE /stores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Store $store */
        $store = $this->storeRepository->find($id);

        if (empty($store))
        {
            return $this->sendError('Store not found');
        }

        if($user = JWTAuth::parseToken()->authenticate())
        {
            if ($user->id != $store->user_id )
            {
                return $this->sendError('You Are Not The Owner Of This Store');
            }

            $store->delete();
            return $this->sendSuccess('Store deleted successfully');
        }

        return $this->sendError('You do not have Auth login First');

    } // End of delete


    public function myOwnStore()
    {
        if($user = JWTAuth::parseToken()->authenticate())
        {
            $myOwnStore =  $user->OwnStores()->paginate(3);
            return $this->sendResponse($myOwnStore, 'Own Store retrieved successfully');
        }
        return $this->sendError('You do not have Auth login First');
    } // End of myOwnStore
}
