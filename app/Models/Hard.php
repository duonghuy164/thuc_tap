<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hard extends Model
{
     public $timestamps = true;
    protected $table = 'hard_driver';
    const PUBLISHED = 1;
    const PENDING = 0;
}
