<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    public $timestamps = true;
    protected $table = 'ram';
    const PUBLISHED = 1;
    const PENDING = 0;
}
