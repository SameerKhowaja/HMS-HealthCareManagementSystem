<?php

namespace App;
use App\Lab_report_params;
use App\Lab_test_name;
use App\Patient;
use App\Lab_technician;
use Illuminate\Database\Eloquent\Model;

class Lab_test_report extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'report_id';
    // no need to insert time if not there
    // public $timestamps = false;


    public function lab_report_params()
    {
        return $this->hasMany(Lab_report_params::class,"report_id");
    }

    public function lab_test_name()
    {
        return $this->belongsTo(Lab_test_name::class,"test_id");
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class,"patient_id");
    }

    public function lab_technician()
    {
        return $this->belongsTo(Lab_technician::class,"technician_id");
    }




}
