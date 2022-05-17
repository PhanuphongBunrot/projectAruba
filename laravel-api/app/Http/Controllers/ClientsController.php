<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StdClass;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //
    public function clients(Request $request)
    {

        print_r ($request->session()->get('sid'));

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://192.168.207.50:4343/rest/show-cmd?iap_ip_addr=192.168.207.50&cmd=show%20clients&sid=" . $request->session()->get('sid'),
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
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            return  view('clientsShow', ['resp' => $resp]);
        }
    }
}
