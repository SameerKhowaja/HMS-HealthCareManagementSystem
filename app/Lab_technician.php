<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab_technician extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'technician_id';

    // no need to insert time if not there
    public $timestamps = false;
}
