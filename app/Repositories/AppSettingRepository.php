<?php

namespace App\Repositories;

use App\Models\AppSetting;
use App\Repositories\BaseRepository;

/**
 * Class AppSettingRepository
 * @package App\Repositories
 * @version November 11, 2020, 10:17 am UTC
*/

class AppSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'about_desc',
        'term_desc',
        'condation_desc',
        'app_share_link',
        'app_review_link'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AppSetting::class;
    }
}
