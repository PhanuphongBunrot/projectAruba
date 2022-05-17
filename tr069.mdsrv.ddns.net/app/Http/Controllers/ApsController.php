<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
class ApsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
         public function __construct()
    {
        Auth::shouldUse('api');
    }
    
         public function get_aps()
    {
        
              
   $response = Http::withHeaders([
    'Content-Type' => 'application/json;charset=UTF-8'
    ])
    ->withOptions(["verify"=>false])
    ->post('https://49.0.64.238:8443/wsg/api/public/v8_2/serviceTicket', [
    'username' => 'admin',
    'password' => 'Sands@2020'
    ]);

        
 if(isset($response->json()['serviceTicket'])){
   
     $token = $response->json()['serviceTicket'];
     
     
     $response_1 = Http::withHeaders([
    'Content-Type' => 'application/json;charset=UTF-8'
    ])
    ->withOptions(["verify"=>false])
     ->post("https://49.0.64.238:8443/wsg/api/public/v8_2/query/ap?serviceTicket=$token", [
         'filters'=>[
             [ 
              'type' => 'APGROUP',
              'value' => '5c8bcd51-12f1-48f1-bc97-98d3eb875b03',
              "operator" => "eq"]
             ]
   
    ]);
   
    $totle = $response_1->json()['totalCount'];
    $page = $totle / 10;
    
$devices = [];
    
    for ($x = 1; $x <= ceil($page);) {
        
           
            $response_2 = Http::withHeaders([
    'Content-Type' => 'application/json;charset=UTF-8'
    ])
    ->withOptions(["verify"=>false])
     ->post("https://49.0.64.238:8443/wsg/api/public/v8_2/query/ap?serviceTicket=$token", [
         'filters'=>[
             [ 
              'type' => 'APGROUP',
              'value' => '5c8bcd51-12f1-48f1-bc97-98d3eb875b03',
              "operator" => "eq"]
             ],'page' => $x
   
    ]);
    
    
     
    foreach ($response_2->json()['list'] as $key => $list) {

        
 $devices[] = ["mac" => $list['apMac'],
            "status" => $list['status'],
            "serial" => $list['serial'],
            "lastSeen" => $list['lastSeen']];
   
    }
   $x++;
    
   }
    

   
return response()->json([
    'status' => 'success',
    'totalCount' => $response_1->json()['totalCount'],
    'device' => $devices
    ],200);
    

 }else{
     return response()->json(['status' => 'error']);
 }
   
   

        
    }
    
             public function get_meraki_aps()
    {
        
        
         $response = Http::withHeaders([
    'Content-Type' => 'application/json;charset=UTF-8',
    'X-Cisco-Meraki-API-Key' => 'c0d3cadcb990053108eca1bb7aed63b5a77c9e71'
    ])
    ->withOptions(["verify"=>false])
    ->get('https://api.meraki.com/api/v1/organizations/614298/devices/statuses');
 
  $devices = [];
  
   foreach ($response->json() as $key => $list) {
       
       
       $devices[] = 
       
       [   "name" => $list['name'],
           "mac" => $list['mac'],
            "status" => $list['status'],
            "serial" => $list['serial']
            ];
       
   }
  
   
   return response()->json([
    'status' => 'success',
    'totalCount' => count($response->json()),
    'device' => $devices
    ],200);
   
   
        
    }
    
    
    

    
}
