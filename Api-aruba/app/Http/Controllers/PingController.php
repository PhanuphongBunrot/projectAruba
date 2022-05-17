<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function ping (Request $req){
        print_r ($req->session()->get('key'));
        echo"aaaa";
    }
}
