<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Patient;

class Appointment_request extends Model
{
    //
    // Set primary key for easy access
    protected $primaryKey = 'appointment_id';
    protected $fillable = ['doctor_id', 'patient_id'];


    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
        
    }

}
