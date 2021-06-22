<?php

namespace App;
use App\Lab_test_name;
use App\Lab_report_params;

use Illuminate\Database\Eloquent\Model;

class Lab_test_parameter extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'param_id';
    // no need to insert time if not there
    public $timestamps = false;

    public function lab_test_name()
    {
        return $this->belongsTo(Lab_test_name::class,'test_id');
    }

    public function lab_report_param()
    {
        return $this->belongsTo(Lab_report_params::class,'param_id');
    }
}
