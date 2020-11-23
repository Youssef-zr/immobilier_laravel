<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function buildingsApproved()
    {
        return $this->hasMany(akkar::class)->where('bu_status','1')->orderBy('id','desc');
    }


    public function buildingsWatting()
    {
        return $this->hasMany(akkar::class)->where('bu_status','0')->orderBy('id','desc');
    }

}
