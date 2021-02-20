<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Treatment;

class Patient extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'patient_id';

    // no need to insert time if not there
    public $timestamps = false;

    public function appointment_requests()
    {
        return $this->hasMany('App\Appointment_request',"appointment_id");
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class,"treatment_id");
    }

    



}
