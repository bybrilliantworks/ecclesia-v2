<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    //
    public function users()
    {
        return $this->hasMany('App\User', 'church_id');
    }
}
