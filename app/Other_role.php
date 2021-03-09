<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other_role extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'role_id';

    // no need to insert time if not there
    public $timestamps = false;
}
