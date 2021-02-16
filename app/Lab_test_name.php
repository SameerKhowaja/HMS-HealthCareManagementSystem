<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab_test_name extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'test_id';
    // no need to insert time if not there
    public $timestamps = false;
}
