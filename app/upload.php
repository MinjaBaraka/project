<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    protected $fillable = [
        'discription','select_department', 'file',
    ];
}