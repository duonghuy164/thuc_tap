<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $timestamps = true;
    protected $table = 'color';
    const PUBLISHED = 1;
    const PENDING = 0;
}
