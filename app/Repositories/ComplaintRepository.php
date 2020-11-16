<?php

namespace App\Repositories;

use App\Models\Complaint;
use App\Repositories\BaseRepository;

/**
 * Class ComplaintRepository
 * @package App\Repositories
 * @version November 11, 2020, 9:42 am UTC
*/

class ComplaintRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'message'
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
        return Complaint::class;
    }
}
