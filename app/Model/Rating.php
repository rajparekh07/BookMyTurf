<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function turf()
    {
        return $this->belongsTo('App\Model\Turf');
    }
}
