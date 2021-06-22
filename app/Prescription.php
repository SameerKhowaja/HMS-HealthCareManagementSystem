<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Treatment;
use App\Prescription;

class Prescription extends Model
{
     // Set primary key for easy access
     protected $primaryKey = 'prescription_id';
     protected $fillable = ['treatment_id', 'medicine_id'];
 
 
     public function treatment()
     {
         return $this->belongsTo(Treatment::class,'treatment_id');
     }
 
     public function medicine()
     {
         return $this->belongsTo(Medicine::class,'medicine_id');
         
     }
 
}
