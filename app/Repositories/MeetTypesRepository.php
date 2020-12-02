<?php

namespace App\Repositories;

use App\Models\MeetTypes;
use App\Models\Store;
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
        $store = Store::find($input['store_id']);
        if(!$store)
        {
            return false;
        }
        if(isset($input['image']))
        {
            $upload_resize =  Resize($input['image'],'meet_type',350,200); // return file name
            (!$upload_resize) ?  $input['image'] = null : $input['image'] = $upload_resize;
        }
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    } // End of create

    public function update($input, $id)
    {


        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $store = Store::find($input['store_id']);

        if(!$store)
        {
            return 'store id not exists';
        }

        if(isset($input['image']))
        {
            $upload_resize =  Resize($input['image'],'meet_type',350,200); // return file name
            (!$upload_resize) ?  $input['image'] = null : $input['image'] = $upload_resize;
        }

        $model->fill($input);

        $model->save();

        return $model;
    } // End of update

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        if(isset($model->image) && $model->getPhotoRealPath() != null)
        {
            RemoveImageFromDisk($model->getPhotoRealPath());
        }

        return $model->delete();
    } // End of delete
}
