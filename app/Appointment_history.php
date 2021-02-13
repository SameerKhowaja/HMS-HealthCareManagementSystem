<?php

namespace App;
use App\Patient;
use App\Doctor;
use App\Appointment_request;

use Illuminate\Database\Eloquent\Model;

class Appointment_history extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'appointment_history_id';
    protected $fillable = ['doctor_id', 'patient_id'];


    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
        
    }


    public function appointment_request()
    {
        return $this->belongsTo(Appointment_request::class,'appointment_id');
        
    }

}
