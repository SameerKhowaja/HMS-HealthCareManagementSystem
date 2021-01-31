<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_table extends Model
{
    // Set primary key for easy access
    protected $primaryKey = 'contact_id';

    // Set Table Name
    protected $table = 'contact_table';

    // no need to insert time if not there
    public $timestamps = false;
}
