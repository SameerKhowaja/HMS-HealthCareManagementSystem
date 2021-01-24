<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'patient_id';

    // no need to insert time if not there
    public $timestamps = false;
}
