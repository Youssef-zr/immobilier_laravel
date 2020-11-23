<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class akkar extends Model
{
    protected $table = 'akkars';
    protected $guarded = ["d_created", 'img'];

    public function getDCreatedAttribute()
    {
        $date = Carbon::parse($this->created_at)->format('d-m-yy');
        return $date;
    }

    public function userInfo()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    
}
