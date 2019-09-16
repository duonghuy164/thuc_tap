<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true;
    protected $table = 'posts';
    const PUBLISHED = 1;
    const PENDING = 0;
}
