<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'doctor_id';

    // no need to insert time if not there
    public $timestamps = false;
}
