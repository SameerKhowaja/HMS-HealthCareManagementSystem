<?php

namespace App;
use App\Patient;
use Illuminate\Database\Eloquent\Model;

class LabTestRequest extends Model
{
    //
    protected $primaryKey = 'test_req_id';


    public function patient()
    {
        return $this->belongsTo(Patient::class,"patient_id");
    }


}
