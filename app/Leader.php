<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'p_id'];

    // public function report()
    // {
    //     return $this->hasMany('App\report','p_id','id');
    // }
}
