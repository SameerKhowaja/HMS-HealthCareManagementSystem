<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'announcement_id';

    // no need to insert time if not there
    public $timestamps = false;
}
