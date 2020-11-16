<?php

namespace App\Http\Controllers;

use App\DataTables\MeetTypesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMeetTypesRequest;
use App\Http\Requests\UpdateMeetTypesRequest;
use App\Repositories\MeetTypesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MeetTypesController extends AppBaseController
{
    /** @var  MeetTypesRepository */
    private $meetTypesRepository;

    public function __construct(MeetTypesRepository $meetTypesRepo)
    {
        $this->meetTypesRepository = $meetTypesRepo;
    }

    /**
     * Display a listing of the MeetTypes.
     *
     * @param MeetTypesDataTable $meetTypesDataTable
     * @return Response
     */
    public function index(MeetTypesDataTable $meetTypesDataTable)
    {
        return $meetTypesDataTable->render('meet_types.index');
    }

    /**
     * Show the form for creating a new MeetTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('meet_types.create');
    }

    /**
     * Store a newly created MeetTypes in storage.
     *
     * @param CreateMeetTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateMeetTypesRequest $request)
    {
        $input = $request->all();

        $meetTypes = $this->meetTypesRepository->create($input);

        Flash::success('Meet Types saved successfully.');

        return redirect(route('meetTypes.index'));
    }

    /**
     * Display the specified MeetTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $meetTypes = $this->meetTypesRepository->find($id);

        if (empty($meetTypes)) {
            Flash::error('Meet Types not found');

            return redirect(route('meetTypes.index'));
        }

        return view('meet_types.show')->with('meetTypes', $meetTypes);
    }

    /**
     * Show the form for editing the specified MeetTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $meetTypes = $this->meetTypesRepository->find($id);

        if (empty($meetTypes)) {
            Flash::error('Meet Types not found');

            return redirect(route('meetTypes.index'));
        }

        return view('meet_types.edit')->with('meetTypes', $meetTypes);
    }

    /**
     * Update the specified MeetTypes in storage.
     *
     * @param  int              $id
     * @param UpdateMeetTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeetTypesRequest $request)
    {
        $meetTypes = $this->meetTypesRepository->find($id);

        if (empty($meetTypes)) {
            Flash::error('Meet Types not found');

            return redirect(route('meetTypes.index'));
        }

        $meetTypes = $this->meetTypesRepository->update($request->all(), $id);

        Flash::success('Meet Types updated successfully.');

        return redirect(route('meetTypes.index'));
    }

    /**
     * Remove the specified MeetTypes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $meetTypes = $this->meetTypesRepository->find($id);

        if (empty($meetTypes)) {
            Flash::error('Meet Types not found');

            return redirect(route('meetTypes.index'));
        }

        $this->meetTypesRepository->delete($id);

        Flash::success('Meet Types deleted successfully.');

        return redirect(route('meetTypes.index'));
    }
}
