<?php

namespace App\Http\Controllers;

use App\DataTables\AppSettingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAppSettingRequest;
use App\Http\Requests\UpdateAppSettingRequest;
use App\Models\AppSetting;
use App\Repositories\AppSettingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AppSettingController extends AppBaseController
{
    /** @var  AppSettingRepository */
    private $appSettingRepository;

    public function __construct(AppSettingRepository $appSettingRepo)
    {
        $this->appSettingRepository = $appSettingRepo;
    }

    /**
     * Display a listing of the AppSetting.
     *
     * @param AppSettingDataTable $appSettingDataTable
     * @return Response
     */
    public function index(AppSettingDataTable $appSettingDataTable)
    {
        return $appSettingDataTable->render('app_settings.index');
    }

    /**
     * Show the form for creating a new AppSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('app_settings.create');
    }

    /**
     * Store a newly created AppSetting in storage.
     *
     * @param CreateAppSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateAppSettingRequest $request)
    {
        $input = $request->all();

        $appSetting = $this->appSettingRepository->create($input);

        Flash::success('App Setting saved successfully.');

        return redirect(route('appSettings.index'));
    }

    /**
     * Display the specified AppSetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $appSetting = $this->appSettingRepository->find($id);

        if (empty($appSetting)) {
            Flash::error('App Setting not found');

            return redirect(route('appSettings.index'));
        }

        return view('app_settings.show')->with('appSetting', $appSetting);
    }

    /**
     * Show the form for editing the specified AppSetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $appSetting = $this->appSettingRepository->find($id);

        if (empty($appSetting)) {
            Flash::error('App Setting not found');

            return redirect(route('appSettings.index'));
        }

        return view('app_settings.edit')->with('appSetting', $appSetting);
    }

    /**
     * Update the specified AppSetting in storage.
     *
     * @param  int              $id
     * @param UpdateAppSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppSettingRequest $request)
    {
        $appSetting = $this->appSettingRepository->find($id);

        if (empty($appSetting)) {
            Flash::error('App Setting not found');

            return redirect(route('appSettings.index'));
        }

        $appSetting = $this->appSettingRepository->update($request->all(), $id);

        Flash::success('App Setting updated successfully.');

        return redirect(route('appSettings.index'));
    }

    /**
     * Remove the specified AppSetting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $appSetting = $this->appSettingRepository->find($id);

        if (empty($appSetting)) {
            Flash::error('App Setting not found');

            return redirect(route('appSettings.index'));
        }

        $this->appSettingRepository->delete($id);

        Flash::success('App Setting deleted successfully.');

        return redirect(route('appSettings.index'));
    }


}
