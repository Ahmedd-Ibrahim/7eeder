<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MeetTypes
 * @package App\Models
 * @version November 11, 2020, 9:33 am UTC
 *
 * @property string $image
 * @property string $slaughter_date
 * @property integer $age
 */
class MeetTypes extends Model
{

    public $table = 'meet_types';

    public $fillable = [
        'image',
        'slaughter_date',
        'age',
        'store_id',
        'meet_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'meet_type' => 'string',
        'slaughter_date' => 'date',
        'age' => 'integer',
        'store_id' => 'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'slaughter_date' => 'required',
        'age' => 'required',
        'meet_type' => 'required',
        'store_id' => 'required'
    ];

    public function getImageAttribute($val){
        if(isset($val))
        {
            return asset('images/'. $val) ;
        }
        return asset('images/logo.jpg');;

    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
