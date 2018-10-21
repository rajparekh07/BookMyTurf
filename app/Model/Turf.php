<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Swis\LaravelFulltext\Indexable;

class Turf extends Model
{

    use Indexable;

    protected $indexContentColumns = ['facilities.value', 'facilities.facility'];

    protected $indexTitleColumns = ['name', 'price', 'footwear', 'address'];

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