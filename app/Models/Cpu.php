<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    public $timestamps = true;
    protected $table = 'cpu';
    const PUBLISHED = 1;
    const PENDING = 0;
}
