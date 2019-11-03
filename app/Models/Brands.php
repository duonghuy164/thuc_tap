<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    public $timestamps = true;
    protected $table = 'brand';
    const PUBLISHED = 1;
    const PENDING = 0;
}
