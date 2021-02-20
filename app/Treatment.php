<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Patient;
use App\Prescription;
use App\Appointment_request;

class Treatment extends Model
{
      //
    // Set primary key for easy access
    protected $primaryKey = 'treatment_id';
    protected $fillable = ['doctor_id', 'patient_id'];


    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
        
    }

    public function prescription()
    {
        return $this->hasMany(Prescription::class,'prescription_id');
        
    }

    


    public function appointment_request()
    {
        return $this->belongsTo(Appointment_request::class,'appointment_id');
        
    }


}
