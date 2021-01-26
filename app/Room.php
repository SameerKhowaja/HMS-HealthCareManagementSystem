<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'room_id';

    // no need to insert time if not there
    public $timestamps = false;
}
