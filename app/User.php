<?php

namespace App;

use App\Models\Store;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password','role','email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Stores() // Favourite
    {
        return $this->belongsToMany(Store::class,'user_store');
    }

    public function OwnStores() // user Own Stores
    {
        return $this->hasMany(Store::class,'user_id');
    }

    public function StoreViews()
    {
        return $this->belongsToMany(Store::class,'user_store_view');
    }
}
