<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;
class dropController extends Controller
{
 public function drop(){
    $conn = new Mongo;
    $companydb  = $conn->iparuba;


    $delete =$companydb->dropCollection('temporary');
    echo "Drop Success";
 }
}
