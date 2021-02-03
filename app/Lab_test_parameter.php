<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab_test_parameter extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'param_id';
    // no need to insert time if not there
    public $timestamps = false;
}
