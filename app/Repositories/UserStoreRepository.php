<?php

namespace App\Repositories;

use App\Models\Store;
use App\Models\User;
use App\Models\UserStore;
use App\Repositories\BaseRepository;

/**
 * Class UserStoreRepository
 * @package App\Repositories
 * @version November 15, 2020, 3:34 pm UTC
*/

class UserStoreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

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
        return UserStore::class;
    }

    public function create($input)
    {

        $store = Store::findOrFail($input['store_id']);
        $user = User::findOrFail($input['user_id']);
        $user->Stores()->syncWithoutDetaching($store);
        $model = $user->Stores();
        return $model;
    }
}
