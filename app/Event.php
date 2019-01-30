<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function chairman()
    {
        return $this->belongsTo('App\Person');
    }
    public function required()
    {
        return $this->belongsToMany('App\Person')->where('required', true);
    }
    public function optional()
    {
        return $this->belongsToMany('App\Person')->where('required', false);
    }

    public function resources()
    {
        return $this->belongsToMany('App\Resource');
    }
}
