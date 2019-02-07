<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{

    public function chairman() : BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    public function required() : BelongsToMany
    {
        return $this->belongsToMany('App\User')->where('required', true);
    }
    public function optional() : BelongsToMany
    {
        return $this->belongsToMany('App\User')->where('required', false);
    }

    public function resources()
    {
        return $this->belongsToMany('App\Resource');
    }
}
