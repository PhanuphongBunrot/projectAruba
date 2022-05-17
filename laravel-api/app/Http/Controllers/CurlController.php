<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Redirect;



use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CurlController extends Controller
{
    //
    public function api(Request $request)
    {
        // $data = [
        //     'user' => 'admin',
        //     'passwd' => 'ssit1234',
        // ];

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://192.168.207.50:4343/rest/login",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30000,

        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => json_encode($data),
        //     CURLOPT_HTTPHEADER => array(
        //         // Set here requred headers
        //         "accept: */*",
        //         "accept-language: en-US,en;q=0.8",
        //         "content-type: application/json",
        //     ),
        // ));
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // $resp = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     $json =json_decode($resp,true);
        //     $sid = $json["sid"];
        //     $request->session()->put('sid',$sid);
        
        //     return view('index',["sid"=>$sid]);
            
          
        // }
    
        $sid[] = array("aaaa", "bbbb","cccc");
        $request->session()->put('sid',$sid);
    }
}
