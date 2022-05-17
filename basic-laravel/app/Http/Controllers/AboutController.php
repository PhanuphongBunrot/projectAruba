<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index(){
        $address = "123 กรุงเทพ ประเทศไทย";
        $tel = "082-333-4455";
        
        // return view('about',compact('address','tel'));
        return view('about')->with('error','404 not found หาข้อมูลไม่เจอ')
        ->with('address',$address)
        ->with('tel',$tel);
        
    }
}
