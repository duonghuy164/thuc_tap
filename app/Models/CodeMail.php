<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeMail extends Model
{
    public $timestamps = true;
    protected $table = 'codemail';
    const PUBLISHED = 1;
    const PENDING = 0;
}
