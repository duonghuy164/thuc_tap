<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    public function Attendances()
    {
    		return $this->hasMany('App\Models\Attendances','staff_id');
    }
}
