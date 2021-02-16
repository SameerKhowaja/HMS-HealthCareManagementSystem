<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'bed_id';

    // no need to insert time if not there
    public $timestamps = false;

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
