<?php

namespace App\Http\Controllers;

use MongoDB\Client as Mongo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiapsController extends Controller
{
    
    public function apiaps(Request $req)
    { // "172.16.8.50", "172.16.16.50"

        $conn =  new Mongo;
        $companydb  = $conn->iparuba;
        $tem = $companydb->temporary;

        $ip = array("172.16.0.50");

        for ($i = 0; $i < count($ip); $i++) {
            //echo "/".($ip[$i]);
            $resp = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8'
            ])
                ->withOptions(["verify" => false])
                ->post('https://' . $ip[$i] . ':4343/rest/login', [
                    'user' => 'admin',
                    'passwd' => 'ssit1234'
                ]);
            $sid = $resp->json()['sid'];
            //echo $sid;
            $response = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8'
            ])
                ->withOptions(["verify" => false])
                ->get('https://' . $ip[$i] . ':4343/rest/show-cmd?iap_ip_addr=' . $ip[$i] . '&cmd=show%20aps&sid=' . $sid);

            $ex = explode('\n', $response);

            // echo"<pre>";
            // print_r($ex);
            // echo"</pre>";

            for ($x = 9; $x < count($ex); $x++) {
                $keywords = preg_split("/[\s,]+/", $ex[$x]);

                $inser = $tem->insertMany([
                    ['Max' => $keywords[0],
                    
                    ]
                    

                ]);
                
               

               
             
            }
        }
       
        echo "AP Save Success";
    }
}
