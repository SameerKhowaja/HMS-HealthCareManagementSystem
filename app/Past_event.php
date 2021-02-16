<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Past_event extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'event_id';

    // no need to insert time if not there
    public $timestamps = false;
}
