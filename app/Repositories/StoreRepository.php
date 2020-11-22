<?php

namespace App\Repositories;

use App\Models\Store;
use App\Repositories\BaseRepository;

/**
 * Class StoreRepository
 * @package App\Repositories
 * @version November 11, 2020, 9:19 am UTC
*/

class StoreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'address',
        'image',
        'active'
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
        return Store::class;
    }

    public function create($input)
    {

        if(isset($input['image']))
        {
            $upload_resize =  Resize($input['image'],'store',350,200); // return file name
             (!$upload_resize) ?  $input['image'] = null : $input['image'] = $upload_resize;

        }
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }
}
