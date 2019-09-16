<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $table = 'attendances';

    public function staff()
    {
    	return $this->belongsTo('App\Models\Staff');
    }
}
