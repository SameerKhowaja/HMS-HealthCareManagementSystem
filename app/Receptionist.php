<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'receptionist_id';

    // no need to insert time if not there
    public $timestamps = false;
}
