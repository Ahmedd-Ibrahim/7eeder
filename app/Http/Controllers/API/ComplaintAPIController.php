<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComplaintAPIRequest;
use App\Http\Requests\API\UpdateComplaintAPIRequest;
use App\Models\Complaint;
use App\Repositories\ComplaintRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComplaintController
 * @package App\Http\Controllers\API
 */

class ComplaintAPIController extends AppBaseController
{
    /** @var  ComplaintRepository */
    private $complaintRepository;

    public function __construct(ComplaintRepository $complaintRepo)
    {
        $this->complaintRepository = $complaintRepo;
    }

    /**
     * Display a listing of the Complaint.
     * GET|HEAD /complaints
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $complaints = $this->complaintRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($complaints->toArray(), 'Complaints retrieved successfully');
    }

    /**
     * Store a newly created Complaint in storage.
     * POST /complaints
     *
     * @param CreateComplaintAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComplaintAPIRequest $request)
    {
        $input = $request->all();

        $complaint = $this->complaintRepository->create($input);

        return $this->sendResponse($complaint->toArray(), 'Complaint saved successfully');
    }

    /**
     * Display the specified Complaint.
     * GET|HEAD /complaints/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Complaint $complaint */
        $complaint = $this->complaintRepository->find($id);

        if (empty($complaint)) {
            return $this->sendError('Complaint not found');
        }

        return $this->sendResponse($complaint->toArray(), 'Complaint retrieved successfully');
    }

    /**
     * Update the specified Complaint in storage.
     * PUT/PATCH /complaints/{id}
     *
     * @param int $id
     * @param UpdateComplaintAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplaintAPIRequest $request)
    {
        $input = $request->all();

        /** @var Complaint $complaint */
        $complaint = $this->complaintRepository->find($id);

        if (empty($complaint)) {
            return $this->sendError('Complaint not found');
        }

        $complaint = $this->complaintRepository->update($input, $id);

        return $this->sendResponse($complaint->toArray(), 'Complaint updated successfully');
    }

    /**
     * Remove the specified Complaint from storage.
     * DELETE /complaints/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Complaint $complaint */
        $complaint = $this->complaintRepository->find($id);

        if (empty($complaint)) {
            return $this->sendError('Complaint not found');
        }

        $complaint->delete();

        return $this->sendSuccess('Complaint deleted successfully');
    }
}
