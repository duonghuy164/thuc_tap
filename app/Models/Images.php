<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
   public $timestamps = true;
    protected $table = 'images';
    const PUBLISHED = 1;
    const PENDING = 0;
}
