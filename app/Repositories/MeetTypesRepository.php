<?php

namespace App\Repositories;

use App\Models\MeetTypes;
use App\Repositories\BaseRepository;

/**
 * Class MeetTypesRepository
 * @package App\Repositories
 * @version November 11, 2020, 9:33 am UTC
*/

class MeetTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'slaughter_date',
        'age'
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
        return MeetTypes::class;
    }

    public function create($input)
    {

        if(isset($input['image']))
        {
            $uploud_resize =     Resize($input['image'],'store',350,150); // return file name
            $input['image'] = $uploud_resize;
        }
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }
}
