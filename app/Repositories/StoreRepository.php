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
    } // End of create
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }
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

    public function storeUpdate($request,$id)
    {
        $inputs = $request->all();
        $store = Store::find($id);
        if(!$store)
        {
            return 'store not found!';
        }

        if (isset($inputs['image']))
        {
            RemoveImageFromDisk($store->getPhotoRealPath());

            $upload_resize =  Resize($inputs['image'],'store',350,200); // return file name

            (!$upload_resize) ?  $inputs['image'] = null : $inputs['image'] = $upload_resize;

        }
        return $store->update($inputs);
    }
}
