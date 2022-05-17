<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{




    public function getdata()
    {
        $data = [
            'user' => 'admin',
            'passwd' => 'ssit1234',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://192.168.207.50:4343/rest/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $json = json_decode($resp, true);
            $sid = $json["sid"];
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://192.168.207.50:4343/rest/show-cmd?iap_ip_addr=192.168.207.50&cmd=show%20clients&sid=" . $sid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
       // echo var_dump ($resp);
        curl_close($curl);

        $json= json_encode($resp);
        $ex = explode('\n', $resp);

        $name = [];
        for ($i = 9; $i < count($ex) - 1; $i++) {
            $a = $ex[$i];
            array_push($name, $a);
        }
        for ($x = 0; $x < count($name) - 2; $x++) {
            $keywords = preg_split("/[\s,]+/", $name[$x]);
            //print_r($keywords);

            if (count($keywords) == 14) {
                $json =   new \stdClass();
                $json->name = "$keywords[0]";
                $json->IPAddress = "$keywords[1]";
                $json->MACAddress = "$keywords[2]";
                $json->OS  = "$keywords[3]";
                $json->ESSID = "$keywords[4]" . " " . "$keywords[5]";
                $json->AccessPoin = "$keywords[6]";
                $json->Channel = "$keywords[7]";
                $json->Type = "$keywords[8]";
                $json->Role = "$keywords[9]" . " " . "$keywords[10]";
                $json->IPv6Address = "$keywords[11]";
                $json->Signal = "$keywords[12]";
                $json->Speed = "$keywords[13]";
                $myjson = json_encode($json,JSON_FORCE_OBJECT);
                echo var_dump ($myjson);
            }
            if (count($keywords) == 15) {
                $json =  new \stdClass();
                $json->name = "$keywords[0]";
                $json->IPAddress = "$keywords[1]";
                $json->MACAddress = "$keywords[2]";
                $json->OS  = "$keywords[3]" . " " . "$keywords[4]";
                $json->ESSID = "$keywords[5]" . " " . "$keywords[6]";
                $json->AccessPoin = "$keywords[7]";
                $json->Channel = "$keywords[8]";
                $json->Type = "$keywords[9]";
                $json->Role = "$keywords[10]" . " " . "$keywords[11]";
                $json->IPv6Address = "$keywords[12]";
                $json->Signal = "$keywords[13]";
                $json->Speed = "$keywords[14]";
                $myjson = json_encode($json,JSON_FORCE_OBJECT);
                echo var_dump ($myjson);
            }
            // $str = json_decode($myjson,JSON_FORCE_OBJECT);

    }
}
}
