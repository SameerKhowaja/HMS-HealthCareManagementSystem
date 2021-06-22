<?php

namespace App;
use App\Patient;
use Illuminate\Database\Eloquent\Model;

class LabTestRequest extends Model
{
    //
    protected $primaryKey = 'test_req_id';
    protected $casts = [
        'test_names' => 'array',
        'test_performed'=>'array'
    ];

    public function setTest_namesAttribute($value)
    {
        $test_names = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
            $test_names[] = $array_item;
            }
        }
        $this->attributes['test_names'] = json_encode($test_names);
    }

    public function setTest_performedAttribute($value)
    {
        $test_performed = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
            $test_performed[] = $array_item;
            }
        }
        $this->attributes['test_performed'] = json_encode($test_performed);
    }


    public function patient()
    {
        return $this->belongsTo(Patient::class,"patient_id");
    }


}
