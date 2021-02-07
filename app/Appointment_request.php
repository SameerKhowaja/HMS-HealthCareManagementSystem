<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment_request extends Model
{
    //
    // Set primary key for easy access
    protected $primaryKey = 'appointment_id';


    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

}
