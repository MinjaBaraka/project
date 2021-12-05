<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    protected $fillable = [
        'text', 'message', 'date_time', 'select_department',
    ];
}


