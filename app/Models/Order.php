<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;
    protected $table = 'orders';
    const PUBLISHED = 1;
    const PENDING = 0;
}
