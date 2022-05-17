<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    public function test(){
        $name = "Tony Stack";
        return view('welcome', compact('name'));
    }
}
