<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
   public $timestamps = true;
    protected $table = 'screen';
    const PUBLISHED = 1;
    const PENDING = 0;
}
