<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Models extends Eloquent
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'model', 
    ];
}
