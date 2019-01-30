<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function chairman()
    {
        return $this->hasOne('App\Person');
    }
    public function required()
    {
        return $this->belongsToMany('App\Person');
    }
    public function optional()
    {
        return $this->belongsToMany('App\Person');
    }

    public function resources()
    {
        return $this->belongsToMany('App\Resource');
    }
}
