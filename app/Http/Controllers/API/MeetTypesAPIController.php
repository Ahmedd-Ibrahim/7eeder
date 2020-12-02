<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMeetTypesAPIRequest;
use App\Http\Requests\API\UpdateMeetTypesAPIRequest;
use App\Models\MeetTypes;
use App\Repositories\MeetTypesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MeetTypesController
 * @package App\Http\Controllers\API
 */

class MeetTypesAPIController extends AppBaseController
{
    /** @var  MeetTypesRepository */
    private $meetTypesRepository;

    public function __construct(MeetTypesRepository $meetTypesRepo)
    {
        $this->meetTypesRepository = $meetTypesRepo;
//        $this->middleware('user.role:admin-moderator',['except'=>['index','show']]);

    }

    /**
     * Display a listing of the MeetTypes.
     * GET|HEAD /meetTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $meetTypes = $this->meetTypesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($meetTypes->toArray(), 'Meet Types retrieved successfully');
    }

    /**
     * Store a newly created MeetTypes in storage.
     * POST /meetTypes
     *
     * @param CreateMeetTypesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMeetTypesAPIRequest $request)
    {
        $input = $request->all();

        $meetTypes = $this->meetTypesRepository->create($input);

        return $this->sendResponse($meetTypes, 'Meet Types saved successfully');
    }

    /**
     * Display the specified MeetTypes.
     * GET|HEAD /meetTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MeetTypes $meetTypes */
        $meetTypes = $this->meetTypesRepository->find($id);

        if (empty($meetTypes)) {
            return $this->sendError('Meet Types not found');
        }

        return $this->sendResponse($meetTypes->toArray(), 'Meet Types retrieved successfully');
    }

    /**
     * Update the specified MeetTypes in storage.
     * PUT/PATCH /meetTypes/{id}
     *
     * @param int $id
     * @param UpdateMeetTypesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeetTypesAPIRequest $request)
    {
        $input = $request->all();

        /** @var MeetTypes $meetTypes */
        $meetTypes = $this->meetTypesRepository->find($id);

        if (empty($meetTypes))
        {
            return $this->sendError('Meet Types not found');
        }

        $meetTypes = $this->meetTypesRepository->update($input, $id);

        return $this->sendResponse($meetTypes, 'MeetTypes updated successfully');
    }

    /**
     * Remove the specified MeetTypes from storage.
     * DELETE /meetTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MeetTypes $meetTypes */
        $meetTypes = $this->meetTypesRepository->find($id);

        if (empty($meetTypes)) {
            return $this->sendError('Meet Types not found');
        }

        $this->meetTypesRepository->delete($id);

        return $this->sendSuccess('Meet Types deleted successfully');
    }
}
