<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable= ['id', 'date', 'sale', 'employee', 'p_id'];
}
