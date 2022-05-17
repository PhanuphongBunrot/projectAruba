<?php

namespace App\Http\Controllers;
use MongoDB\Client as Mongo;
use Illuminate\Http\Request;
class MongoTest extends Controller
{
    //
    public function mongo(){
        $mon = new Mongo ;
        $conn = $mon->mydb->users;
        return $conn->find()->toArray();
    }
}
