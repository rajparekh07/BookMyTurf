<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Turf extends Model
{
    protected $table = 'turfs';

    public function facilities()
    {
        return $this->hasMany('App\Model\TurfFacility');
    }

    public function images()
    {
        return $this->hasMany('App\Model\TurfImage');
    }
}