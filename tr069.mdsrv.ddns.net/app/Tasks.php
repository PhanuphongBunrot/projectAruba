<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Eloquent
{
    protected $connection = 'mongodb';

    protected $fillable = [
           '_id'
       ];
       public function get_faults(){

        return $this->hasMany('App\Faults','device','device');
        }
}
