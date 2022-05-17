<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TestapiController extends Controller
{
    //

    function index()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json;charset=UTF-8'
        ])
            ->withOptions(["verify" => false])
            ->get('http://localhost/vue_crud/customer/');
            $str = $response->json()['response'];
             // preg_split("/[\s,]+/", $str);
             for ($i=0;$i <count($str);$i++){
                print_r ($str[$i]['ip_name']."<br>");
             }
            
            // foreach($str as $a => $b){
            //     echo "$a  $b <br>";

            // }
        //print_r($response) ;
       // echo $str;
        //return var_dump($ip);
    //     echo"<pre>";
    //    var_dump ($str) ;
    //     echo"</pre>";
        //    $ex = explode('{',$response);
        //     
            //$str = substr($ex[5],11,-3);
        //      
        //     echo $str;
          // print_r($ex[2]) ; 
        




        //$collection->json()['name'];
        //echo $collection;
        //return view('homeapi',['name' => $name]);

    }
}
