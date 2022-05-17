<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function client (){
        $ip = array("49.0.64.238");

        for ($i = 0; $i < count($ip); $i++) {
            //echo "/".($ip[$i]);
            $resp = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8'
            ])
                ->withOptions(["verify" => false])
                ->post('https://' . $ip[$i] .':8443/wsg/api/public/v8_2/serviceTicket', [
                    'username' => 'admin',
                    'password' => 'Sands@2020'
                ]);
              
                $Ticket = $resp->json()['serviceTicket'];
              
                $resp1 = Http::withHeaders([
                    'Content-Type' => 'application/json;charset=UTF-8'
                ])
                    ->withOptions(["verify" => false])
                    ->post('https://' . $ip[$i] .':8443/wsg/api/public/v8_2/query/client?serviceTicket='.$Ticket, [
                      "filters" =>[
                          [
                            "type" => "DOMAIN",
                            "value" =>"8b2081d5-9662-40d9-a3db-2a3cf4dde3f7"
                          ]
                          ],
                          "fullTextSearch"=> [
                            "type" => "AND",
                            "value" => ""
                            ]
                        ]);
                        
                       /// echo $resp1;
                        return view('welcome',['resp1' => $resp1]);
                        
        }
    }
}
