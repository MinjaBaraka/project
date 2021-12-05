<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormUser extends Model
{
    protected $fillable = [
        'name', 'email', 'message',
    ];
}
