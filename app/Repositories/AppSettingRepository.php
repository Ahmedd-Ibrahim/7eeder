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
        'about',
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

    public function create($input)
    {

        $model = $this->model->newInstance($input);

        $about = [
            'en' => $input['about'],
            'ar' => $input['about_ar']
        ];
        $condation = [
            'en' => $input['condation_desc'],
            'ar' => $input['condation_desc_ar']
        ];
        $term_desc = [
            'en' => $input['term_desc'],
            'ar' => $input['term_desc_ar']
        ];
        $model->setTranslations('about', $about);
        $model->setTranslations('condation_desc', $condation);
        $model->setTranslations('term_desc', $term_desc);
        $model->save();

        return $model;
    }

    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $about = [
            'en' => $input['about'],
            'ar' => $input['about_ar']
        ];
        $condation = [
            'en' => $input['condation_desc'],
            'ar' => $input['condation_desc_ar']
        ];
        $term_desc = [
            'en' => $input['term_desc'],
            'ar' => $input['term_desc_ar']
        ];

        $model->setTranslations('about', $about);
        $model->setTranslations('condation_desc', $condation);
        $model->setTranslations('term_desc', $term_desc);
        $model->save();

        return $model;
    }

}
