<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use MongoDB\Client as Mongo;
use Illuminate\Http\Request;
use Acamposm\Ping\Ping;
use Acamposm\Ping\PingCommandBuilder;
class ApiStatusController extends Controller
{
    //
    public function apimaster(){
        
        $mon = new Mongo;
        $conn = $mon->iparuba->ipmaster;
        $data = $conn->find()->toArray();
        for ($r = 0 ; $r < count($data); $r++){
            $ip = $data[$r]['ip'];
            
            $exe= shell_exec("ping -n 2 $ip");
        
            if(strrpos($exe, "100% loss") > 0){
                
                $ip = null;
                
            }else{
        
            $resp = Http::withHeaders([
                    'Content-Type' => 'application/json;charset=UTF-8'
                    ])
                    ->withOptions(["verify"=>false])
                    ->post('https://'.$ip.':4343/rest/login', [
                    'user' => 'admin',
                    'passwd' => 'ssit1234'
                    ]);
                 $sid = $resp->json()['sid'];
                 $response = Http::withHeaders([
                    'Content-Type' => 'application/json;charset=UTF-8'
                ])
                    ->withOptions(["verify" => false])
                    ->get('https://'.$ip.':4343/rest/show-cmd?iap_ip_addr='.$ip.'&cmd=show%20aps&sid='.$sid);
                    $ex = explode('\n', $response);
                    // echo"<pre>";
                    // print_r($ex);
                    // echo"</pre>";
                    for ($x = 9; $x < count($ex); $x++) {
                        $keywords = preg_split("/[\s,]+/", $ex[$x]);
                        
                        $key = "/".$keywords[0];
                       
                        
                       
                      echo $key;
        
                    }       
        
            }
        }



            // for ($r = 0 ; $r < count($data) ; $r++){
            //     $host = $data[$r]['ip'];
            
            //     $ch = curl_init($host);
            //     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //     $data = curl_exec($ch);
            //     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //     curl_close($ch);
            //     if($httpcode !== 0){
            //     // Do stuff for the server being online
            //     echo 'online';
            //     } else {
            //     // Do stuff for the server being offline
            //     echo 'offline';
            //     }
                    
            // }
    }
}