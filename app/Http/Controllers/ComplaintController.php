<?php

namespace App\Http\Controllers;

use App\DataTables\ComplaintDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Repositories\ComplaintRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ComplaintController extends AppBaseController
{
    /** @var  ComplaintRepository */
    private $complaintRepository;

    public function __construct(ComplaintRepository $complaintRepo)
    {
        $this->complaintRepository = $complaintRepo;
    }

    /**
     * Display a listing of the Complaint.
     *
     * @param ComplaintDataTable $complaintDataTable
     * @return Response
     */
    public function index(ComplaintDataTable $complaintDataTable)
    {
        return $complaintDataTable->render('complaints.index');
    }

    /**
     * Show the form for creating a new Complaint.
     *
     * @return Response
     */
    public function create()
    {
        return view('complaints.create');
    }

    /**
     * Store a newly created Complaint in storage.
     *
     * @param CreateComplaintRequest $request
     *
     * @return Response
     */
    public function store(CreateComplaintRequest $request)
    {
        $input = $request->all();

        $complaint = $this->complaintRepository->create($input);

        Flash::success('Complaint saved successfully.');

        return redirect(route('complaints.index'));
    }

    /**
     * Display the specified Complaint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $complaint = $this->complaintRepository->find($id);

        if (empty($complaint)) {
            Flash::error('Complaint not found');

            return redirect(route('complaints.index'));
        }

        return view('complaints.show')->with('complaint', $complaint);
    }

    /**
     * Show the form for editing the specified Complaint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $complaint = $this->complaintRepository->find($id);

        if (empty($complaint)) {
            Flash::error('Complaint not found');

            return redirect(route('complaints.index'));
        }

        return view('complaints.edit')->with('complaint', $complaint);
    }

    /**
     * Update the specified Complaint in storage.
     *
     * @param  int              $id
     * @param UpdateComplaintRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplaintRequest $request)
    {
        $complaint = $this->complaintRepository->find($id);

        if (empty($complaint)) {
            Flash::error('Complaint not found');

            return redirect(route('complaints.index'));
        }

        $complaint = $this->complaintRepository->update($request->all(), $id);

        Flash::success('Complaint updated successfully.');

        return redirect(route('complaints.index'));
    }

    /**
     * Remove the specified Complaint from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $complaint = $this->complaintRepository->find($id);

        if (empty($complaint)) {
            Flash::error('Complaint not found');

            return redirect(route('complaints.index'));
        }

        $this->complaintRepository->delete($id);

        Flash::success('Complaint deleted successfully.');

        return redirect(route('complaints.index'));
    }
}
