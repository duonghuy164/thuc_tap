<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $timestamps = true;
    protected $table = 'price';
    const PUBLISHED = 1;
    const PENDING = 0;
}
