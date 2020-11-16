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

        return $this->sendResponse(StoreResource::collection(Store::all()), 'Stores retrieved successfully');
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

        $vaildation = Validator::make($request->all(),[
           'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
//            'active' => 'required',
            'user_id' => 'required',
        ]);
        if($vaildation->fails())
        {
            return $this->sendError('Store not found');
        }
        $input['active'] ='active'; // default active

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

        if (empty($store)) {
            return $this->sendError('Store not found');
        }

        $store->delete();

        return $this->sendSuccess('Store deleted successfully');
    }


}
