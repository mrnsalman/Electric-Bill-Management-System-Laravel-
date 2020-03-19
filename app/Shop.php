<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function bills()
    {
        return $this->hasMany('App\Bill');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
