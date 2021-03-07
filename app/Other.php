<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'other_id';

    // no need to insert time if not there
    public $timestamps = false;
}
