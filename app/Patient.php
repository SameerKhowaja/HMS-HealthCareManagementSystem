<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Treatment;
use App\Hospital_data;
use App\Lab_test_report;
use App\LabTestRequest;

class Patient extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'patient_id';

    // no need to insert time if not there
    public $timestamps = false;

    public function appointment_requests()
    {
        return $this->hasMany('App\Appointment_request',"patient_id");
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class,"patient_id");
    }

    public function hospital_data()
    {
        return $this->belongsTo(Hospital_data::class,'primary_id');
    }

    public function lab_test_report()
    {
        return $this->hasMany(Lab_test_report::class,"report_id");
    }


    public function Patient()
    {
        return $this->hasMany(Lab_report_params::class,"report_id");
    }

    public function lab_test_req()
    {
        return $this->hasMany(LabTestRequest::class,"patient_id");
    }




}
