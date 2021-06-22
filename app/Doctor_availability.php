<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_availability extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'doctor_available_id';

    // Table Name
    protected $table = 'doctor_availability';

    // no need to insert time if not there
    public $timestamps = false;
}
