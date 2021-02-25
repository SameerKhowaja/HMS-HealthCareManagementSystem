<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Appointment_request;
use App\Treatment;
use App\Hospital_data;

class Doctor extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'doctor_id';

    // no need to insert time if not there
    public $timestamps = false;

    public function appointment_requests()
    {
        return $this->hasMany(Appointment_request::class,"doctor_id");
    }


    public function treatments()
    {
        return $this->hasMany(Treatment::class,"doctor_id");
    }

    public function hospital_data()
    {
        return $this->belongsTo(Hospital_data::class,'primary_id');
        
    }

}
