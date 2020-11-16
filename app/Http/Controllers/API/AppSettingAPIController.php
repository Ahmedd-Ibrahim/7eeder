<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAppSettingAPIRequest;
use App\Http\Requests\API\UpdateAppSettingAPIRequest;
use App\Models\AppSetting;
use App\Repositories\AppSettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AppSettingController
 * @package App\Http\Controllers\API
 */

class AppSettingAPIController extends AppBaseController
{
    /** @var  AppSettingRepository */
    private $appSettingRepository;

    public function __construct(AppSettingRepository $appSettingRepo)
    {
        $this->appSettingRepository = $appSettingRepo;
    }

    /**
     * Display a listing of the AppSetting.
     * GET|HEAD /appSettings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $appSettings = $this->appSettingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($appSettings->toArray(), 'App Settings retrieved successfully');
    }

    /**
     * Store a newly created AppSetting in storage.
     * POST /appSettings
     *
     * @param CreateAppSettingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAppSettingAPIRequest $request)
    {
        $input = $request->all();

        $appSetting = $this->appSettingRepository->create($input);

        return $this->sendResponse($appSetting->toArray(), 'App Setting saved successfully');
    }

    /**
     * Display the specified AppSetting.
     * GET|HEAD /appSettings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AppSetting $appSetting */
        $appSetting = $this->appSettingRepository->find($id);

        if (empty($appSetting)) {
            return $this->sendError('App Setting not found');
        }

        return $this->sendResponse($appSetting->toArray(), 'App Setting retrieved successfully');
    }

    /**
     * Update the specified AppSetting in storage.
     * PUT/PATCH /appSettings/{id}
     *
     * @param int $id
     * @param UpdateAppSettingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAppSettingAPIRequest $request)
    {
        $input = $request->all();

        /** @var AppSetting $appSetting */
        $appSetting = $this->appSettingRepository->find($id);

        if (empty($appSetting)) {
            return $this->sendError('App Setting not found');
        }

        $appSetting = $this->appSettingRepository->update($input, $id);

        return $this->sendResponse($appSetting->toArray(), 'AppSetting updated successfully');
    }

    /**
     * Remove the specified AppSetting from storage.
     * DELETE /appSettings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AppSetting $appSetting */
        $appSetting = $this->appSettingRepository->find($id);

        if (empty($appSetting)) {
            return $this->sendError('App Setting not found');
        }

        $appSetting->delete();

        return $this->sendSuccess('App Setting deleted successfully');

    } // End of destroy

    public function about()
    {
        try {
            $about = AppSetting::first()->about_desc;
            return $this->sendResponse($about, 'AppSetting updated successfully');
        } catch (\ Exception $e)
        {
            return $this->sendResponse('under Update', 'AppSetting about not found');
        }

    } // End of about

    public function term()
    {
        try {
            $term = AppSetting::first()->term_desc;
            return $this->sendResponse($term, 'AppSetting updated successfully');
        } catch (\ Exception $e)
        {
            return $this->sendResponse('under Update', 'AppSetting term not found');
        }

    } // End of term

    public function appCondation()
    {
        try {
            $condation = AppSetting::first()->condation_desc;
            return $this->sendResponse($condation, 'AppSetting updated successfully');
        } catch (\ Exception $e)
        {
            return $this->sendResponse('under Update', 'AppSetting condation not found');
        }

    } // End of appCondation

    public function review()
    {
        try {
            $review = AppSetting::first()->app_review_link;
            return $this->sendResponse($review, 'AppSetting updated successfully');
        } catch (\ Exception $e)
        {
            return $this->sendResponse('under Update', 'AppSetting condation not found');
        }

    } // End of review

} // End of controller class
