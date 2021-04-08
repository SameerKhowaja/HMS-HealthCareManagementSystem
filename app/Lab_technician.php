<?php

namespace App;
use App\Lab_test_report;
use App\Hospital_data;
use Illuminate\Database\Eloquent\Model;

class Lab_technician extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'technician_id';

    // no need to insert time if not there
    public $timestamps = false;

    public function lab_test_report()
    {
        return $this->hasMany(Lab_test_report::class,"report_id");
    }

    public function hospital_data()
    {
        return $this->belongsTo(Hospital_data::class,'primary_id');
    }

    
}
