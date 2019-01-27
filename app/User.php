<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sex', 'givenName', 'familyName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at', 'updated_at', 'sex'
    ];
    
     /**
     * The default user image based on sex.
     *
     * @var string
     */
    public function getProfileImgAttribute() {
       return asset("img/user/profile-".$this->sex.".png");
    }

    /**
     * Boot Event
     * 
     */
    public static function boot() {
        parent::boot();
        static::saving(function($model) {
            /* Genarating a unique verification string when the "Creating Event" is fired */
            $password = $model->password ?? "123456";
            $model->password = Hash::make($password);
        });
    }

}
