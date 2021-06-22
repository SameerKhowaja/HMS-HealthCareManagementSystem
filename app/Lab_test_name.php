<?php

namespace App;
use App\Lab_test_parameter;
use App\Lab_test_report;

use Illuminate\Database\Eloquent\Model;

class Lab_test_name extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'test_id';
    // no need to insert time if not there
    public $timestamps = false;


    public function lab_test_parameters()
    {
        return $this->hasMany(Lab_test_parameter::class,"test_id");
    }

    public function lab_test_report()
    {
        return $this->hasMany(Lab_test_report::class,"test_id");
    }
}
