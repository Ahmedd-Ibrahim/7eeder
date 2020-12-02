<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


/**
 * Class Store
 * @package App\Models
 * @version November 11, 2020, 9:19 am UTC
 *
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $image
 * @property integer $views
 * @property string $active
 * @property integer $user_id
 */
class Store extends Model
{

    public $table = 'stores';

    protected $hidden = ['pivot','users'];

    protected $appends = ['favorite'];

    protected $photoRealPath;

    public $fillable = [
        'name',
        'phone',
        'address',
        'image',
        'views',
        'active',
        'user_id',
        'favorite'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'image' => 'string',
        'views' => 'integer',
        'active' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
//        'active' => 'required',
//        'user_id' => 'required',
        'image' => 'mimes:jpeg,jpg,png'
    ];

    public function getPhotoRealPath()
    {
        return $this->photoRealPath;
    }

    public function getImageAttribute($val){
        if(isset($val))
        {
            $this->photoRealPath = $val;
            return asset('images/'. $val);
        }

        return asset('images/logo.jpg');

    }

    public function getFavoriteAttribute()
    {

        if(auth()->guard('api')->user())
        {
            $user = Auth::user() ?? JWTAuth::parseToken()->authenticate();
            if($user)
            {
                // if this store id exists in store ids relation [favourite relation ]
                $userStores = $user->Stores()->find($this->id);
                if($userStores)
                {
                    return true;
                }else{
                    return false;
                }

            } // End of if auth
            else{
                return false;
            }
        }else{
            return false;
        }

    } // End of favourite attr

    /* Begin Relations */
    public function Complaint(){

        return $this->belongsTo(Complaint::class,'user_id');
    }

    public function MeetTypes(){
        return $this->hasMany(MeetTypes::class, 'store_id');
    }

    public function Users()  // Favourite
    {
        return $this->belongsToMany(User::class,'user_store');
    }

    public function User()  // Owner of this store
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function UserViews()
    {
        return $this->belongsToMany(User::class,'user_store_view');
    }
    /* End Relations */

}
