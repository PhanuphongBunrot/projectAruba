<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Devices;
use App\Admin;
use Ixudra\Curl\Facades\Curl;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login']]);
        Auth::shouldUse('api');
    }

    public function setParameterValues(Request $request)
    {
           
        $param = array();
        $id = ''; 
        foreach ($request->data as $cpe){ 
            $paramiter = $cpe['paramiter'];
            $value = $cpe['value'];
            $param_all = ["$paramiter","$value"];
            $id = $cpe['sn'];
            array_push($param, $param_all);
            }
        $link = env("APP_API_URL").'/devices/'.$id.'/tasks?timeout=3000&connection_request';
      
        $response = Curl::to($link)
        ->withData( array( 'name' => 'setParameterValues','parameterValues' => $param) )
        ->asJson()
         ->post();
          
          return response()->json(['name' => $response]);
      
    }
    
    public function adddevice(Request $request)
    {
        $id =  $request->data['SerialNumber'];
        $tag =  $request->data['tag'];
        
        $device = Devices::where('VirtualParameters.SerialNumber._value',$id)->first();
     
     if($device){
         if($device['_tags']){
             return response()->json(['status' => 'alreadyexists','text' => 'A device with this serial number already exists']);
         }else{
             
        $link = env("APP_API_URL").'/devices/'.urlencode($device['_id']).'/tags/'.$tag.'';
      
        $response = Curl::to($link)
        ->post();
             return response()->json(['status' => 'Success','text' => 'Success']);
         }
         
     }else{
         return response()->json(['status' => 'notfound','text' => 'serial number not found']);
     }
       
        
       /*
        $link = env("APP_API_URL").'/devices/'.$id.'/tags/'.$tag.'';
        $response = Curl::to($link)
       ->post(); */

        
    }

    public function refresh_all(Request $request)
    {
        $id =  $request->data['sn'];
        $baseParamiter =  $request->data['baseParamiter'];
        $link = env("APP_API_URL").'/devices/'.$id.'/tasks?timeout=3000&connection_request';
        $response = Curl::to($link)
        ->withData( array( 'name' => 'refreshObject','objectName' => ''.$baseParamiter.'') )
        ->asJson()
        ->post();
        
        return response()->json(['name' => $response]);
    }
    public function reboot(Request $request)
    {
        $id = $request->data['id'];
        $link = env("APP_API_URL").'/devices/'.$id.'/tasks?timeout=3000&connection_request';
        $response = Curl::to($link)
        ->withData( array( 'name' => 'reboot' ) )
        ->asJson()
        ->post();

        return response()->json(['name' => $response]);
       
      
    }

    public function reset(Request $request)
    {
  
        $id = $request->data['id'];
        $link = env("APP_API_URL").'/devices/'.$id.'/tasks?timeout=3000&connection_request';
        $response = Curl::to($link)
        ->withData( array( 'name' => 'factoryReset' ) )
        ->asJson()
        ->post();
        return response()->json(['name' => $response]);
      
    }
    public function deletecpe(Request $request)
    {
   
   
        $id = $request->data['id'];
        $link = env("APP_API_URL").'/devices/'.$id.'';
        $response = Curl::to($link)
        ->delete();
     
        return response()->json(['name' => $response]);
      
    }
    public function index(Request $request)
    {

        $id = request()->id;

       // $admin = Admin::find($id);


        $search = request()->Searchtext;
        $title = request()->Searchtitle;
        $device1s = Devices::select('_id','_tags',
        'VirtualParameters.Manufacturer._value',
        'VirtualParameters.ProductClass._value',
        'VirtualParameters.SerialNumber._value',
        'VirtualParameters.SoftwareVersion._value',
        'VirtualParameters.model._value',
     '_lastInform');

     if (isset($search) && !empty($search)) {

        switch ($title) {
            case "SERIAL":
                $device1s->where([
                    ['VirtualParameters.SerialNumber._value','LIKE','%'.$search.'%'],
                ]);
                break;
            case 'PRODUCTCLASS':
                $device1s->where([
                    ['VirtualParameters.ProductClass._value','LIKE','%'.$search.'%'],
                ]);
                break;
            case 'MODEL':
                 $device1s->where([
                    ['VirtualParameters.model._value','LIKE','%'.$search.'%'],
                ]);
                break;
            case 'MANUFACTURER':
                $device1s->where([
                    ['VirtualParameters.Manufacturer._value','LIKE','%'.$search.'%'],
                ]);
                break;
            case 'SOFTWAREVERSION':
                $device1s->where([
                    ['VirtualParameters.SoftwareVersion._value','LIKE','%'.$search.'%'],
                ]);
                break;
            case 'STATUS':

              

                if(strtolower($search) === "online"){

                    $dtt = Carbon::now()->addMinutes(-60);
                    $device1s->where([
                        ['_lastInform','>',$dtt],
                    ]);
                }
                if(strtolower($search) === "offline"){
                    $dtt1 = Carbon::now()->addMinutes(-180);
                    $device1s->where([
                        ['_lastInform','<',$dtt1],
                    ]);
                }
                
                    break;
            default:
                break;
        }

       }
      


       $devices =$device1s->paginate(25);

        return $devices;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $devices = Devices::findOrFail($id);

        return $devices;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
