<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'medicine_id';
    // no need to insert time if not there
    public $timestamps = false;
}
