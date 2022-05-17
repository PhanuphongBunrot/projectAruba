<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apsController extends Controller
{
    //
    public function getaps()
    {
        $ip = array("172.16.0.50", "172.16.4.50", "172.16.8.50", "172.16.12.50", "172.16.16.50");

        $data = [
            'user' => 'admin',
            'passwd' => 'ssit1234',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://" . $ip[0] . ":4343/rest/login",
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
            CURLOPT_URL => "https://" . $ip[0] . ":4343/rest/show-cmd?iap_ip_addr=" . $ip[0] . "&cmd=show%20aps&sid=" . $sid,
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

        curl_close($curl);
        // echo  ($resp);
        $ex = explode('\n', $resp);
        //print_r($ex)  ;
        $name = [];
        for ($i = 9; $i < count($ex) ; $i++) {
            $a = $ex[$i];
            array_push($name, $a);
        }
        //print_r($name);
        for ($x = 0; $x < count($name); $x++) {
            $keywords = preg_split("/[\s,]+/", $name[$x]);
            //    echo"<pre>";
            //     print_r($keywords);
            //     echo"</pre>";
            $json =   new \stdClass();
            $json->name = "$keywords[0]";
            $json->ip = "$keywords[1]";
            $json->clients = "$keywords[4]";
            $json->channel = "$keywords[10]";
            $myjson = json_encode($json);
            echo $myjson;
        }
        $data = [
            'user' => 'admin',
            'passwd' => 'ssit1234',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://" . $ip[1] . ":4343/rest/login",
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
            CURLOPT_URL => "https://" . $ip[1] . ":4343/rest/show-cmd?iap_ip_addr=" . $ip[1] . "&cmd=show%20aps&sid=" . $sid,
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

        curl_close($curl);
        // echo  ($resp);
        $ex = explode('\n', $resp);
        //print_r($ex)  ;
        $name = [];
        for ($i = 9; $i < count($ex) ; $i++) {
            $a = $ex[$i];
            array_push($name, $a);
        }
        //print_r($name);
        for ($x = 0; $x < count($name); $x++) {
            $keywords = preg_split("/[\s,]+/", $name[$x]);
            //    echo"<pre>";
            //     print_r($keywords);
            //     echo"</pre>";
            $json =   new \stdClass();
            $json->name = "$keywords[0]";
            $json->ip = "$keywords[1]";
            $json->clients = "$keywords[4]";
            $json->channel = "$keywords[10]";
            $myjson = json_encode($json);
            echo $myjson;
        }
        $data = [
            'user' => 'admin',
            'passwd' => 'ssit1234',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://" . $ip[2] . ":4343/rest/login",
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
            CURLOPT_URL => "https://" . $ip[2] . ":4343/rest/show-cmd?iap_ip_addr=" . $ip[2] . "&cmd=show%20aps&sid=" . $sid,
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

        curl_close($curl);
        // echo  ($resp);
        $ex = explode('\n', $resp);
        //print_r($ex)  ;
        $name = [];
        for ($i = 9; $i < count($ex); $i++) {
            $a = $ex[$i];
            array_push($name, $a);
        }
        //print_r($name);
        for ($x = 0; $x < count($name); $x++) {
            $keywords = preg_split("/[\s,]+/", $name[$x]);
            //    echo"<pre>";
            //     print_r($keywords);
            //     echo"</pre>";
            $json =   new \stdClass();
            $json->name = "$keywords[0]";
            $json->ip = "$keywords[1]";
            $json->clients = "$keywords[4]";
            $json->channel = "$keywords[10]";
            $myjson = json_encode($json);
            echo $myjson;
        }
        $data = [
            'user' => 'admin',
            'passwd' => 'ssit1234',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://" . $ip[3] . ":4343/rest/login",
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
            CURLOPT_URL => "https://" . $ip[3] . ":4343/rest/show-cmd?iap_ip_addr=" . $ip[3] . "&cmd=show%20aps&sid=" . $sid,
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

        curl_close($curl);
        // echo  ($resp);
        $ex = explode('\n', $resp);
        //print_r($ex)  ;
        $name = [];
        for ($i = 9; $i < count($ex) ; $i++) {
            $a = $ex[$i];
            array_push($name, $a);
        }
        //print_r($name);
        for ($x = 0; $x < count($name); $x++) {
            $keywords = preg_split("/[\s,]+/", $name[$x]);
            //    echo"<pre>";
            //     print_r($keywords);
            //     echo"</pre>";
            $json =   new \stdClass();
            $json->name = "$keywords[0]";
            $json->ip = "$keywords[1]";
            $json->clients = "$keywords[4]";
            $json->channel = "$keywords[10]";
            $myjson = json_encode($json);
            echo $myjson;
        }
        $data = [
            'user' => 'admin',
            'passwd' => 'ssit1234',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://" . $ip[4] . ":4343/rest/login",
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
            CURLOPT_URL => "https://" . $ip[4] . ":4343/rest/show-cmd?iap_ip_addr=" . $ip[4] . "&cmd=show%20aps&sid=" . $sid,
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

        curl_close($curl);
        // echo  ($resp);
        $ex = explode('\n', $resp);
        //print_r($ex)  ;
        $name = [];
        for ($i = 9; $i < count($ex) ; $i++) {
            $a = $ex[$i];
            array_push($name, $a);
        }
        //print_r($name);
        for ($x = 0; $x < count($name); $x++) {
            $keywords = preg_split("/[\s,]+/", $name[$x]);
            //    echo"<pre>";
            //     print_r($keywords);
            //     echo"</pre>";
            $json =   new \stdClass();
            $json->name = "$keywords[0]";
            $json->ip = "$keywords[1]";
            $json->clients = "$keywords[4]";
            $json->channel = "$keywords[10]";
            $myjson = json_encode($json);
            echo $myjson;
        }
    }
}
