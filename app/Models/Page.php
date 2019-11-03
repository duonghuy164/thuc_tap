<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = true;
    protected $table = 'pages';
    const PUBLISHED = 1;
    const PENDING = 0;
}
