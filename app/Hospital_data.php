<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;

class Hospital_data extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'primary_id';

    public function doctor()
    {
        return $this->hasOne(Doctor::class,"primary_id");
    }



}
