<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Paramiter extends Eloquent
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'model','mode',  'name',  'paramiter', 
    ];
}
