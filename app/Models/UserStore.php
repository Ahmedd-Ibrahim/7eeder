<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserStore
 * @package App\Models
 * @version November 15, 2020, 3:34 pm UTC
 *
 */
class UserStore extends Model
{

    public $table = 'user_store';

    public $fillable = [
        'user_id',
        'store_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id'=> 'integer',
        'store_id'=> 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'user_id' => 'required',
        'store_id' => 'required'
    ];


}
