<?php

namespace App;
use App\Lab_test_parameter;
use App\Lab_test_report;

use Illuminate\Database\Eloquent\Model;

class Lab_report_params extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'report_param_id';
    // no need to insert time if not there
    public $timestamps = false;

    public function lab_test_parameter()
    {
        return $this->belongsTo(Lab_test_parameter::class,"param_id");
    }

    public function lab_test_report()
    {
        return $this->belongsTo(Lab_test_report::class,"report_id");
    }

}
