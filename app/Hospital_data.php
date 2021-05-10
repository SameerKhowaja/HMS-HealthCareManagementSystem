<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Patient;
use App\Lab_technician;

class Hospital_data extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'primary_id';
    protected $perPage = 20;

    public function doctor()
    {
        return $this->hasOne(Doctor::class,"primary_id");
    }

    public function patient()
    {
        return $this->hasOne(Patient::class,"primary_id");
    }


    public function lab_technician()
    {
        return $this->hasOne(Lab_technician::class,"primary_id");
    }


}
