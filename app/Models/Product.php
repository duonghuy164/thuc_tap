<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    protected $table = 'product';
    const PUBLISHED = 1;
    const PENDING = 0;
}
