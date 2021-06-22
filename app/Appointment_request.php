<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Patient;
use App\Appointment_histories;
use App\Treatment;

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

    public function appointment_histories()
    {
        return $this->hasOne(Appointment_history::class);
    }

    public function treatment()
    {
        return $this->hasOne(Treatment::class,'appointment_id');
        
    }

}
