<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Devices extends Model
{

    protected $connection = 'mongodb';
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
