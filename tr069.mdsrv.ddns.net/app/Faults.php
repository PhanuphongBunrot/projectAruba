<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Faults extends Eloquent
{
    protected $connection = 'mongodb';

    protected $fillable = [
           '_id'
       ];
       public function tasks() {
        return $this->belongsTo('App\Tasks','device','device');
    }
}
