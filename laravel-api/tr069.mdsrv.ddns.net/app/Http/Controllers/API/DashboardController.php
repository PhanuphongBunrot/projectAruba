<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Devices;
use DB;
use Carbon\Carbon;
use App\Admin;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
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
    
    public function index()
    {
        //
    }

    public function gettotal($id)
    {

        $admin = Admin::find($id);

        if($admin->role !== 'root'){
        $count = Devices::all()->where('_tags', $admin->tag)->count();

        $dtt = Carbon::now()->addMinutes(-60);
        $online = Devices::where('_lastInform','>',$dtt)->where('_tags', $admin->tag)->count();

        $dtt1 = Carbon::now()->addMinutes(-180);
        $offline = Devices::where('_lastInform','<',$dtt1)->where('_tags', $admin->tag)->count();
        }else{
            $count = Devices::all()->count();

            $dtt = Carbon::now()->addMinutes(-60);
            $online = Devices::where('_lastInform','>',$dtt)->count();
    
            $dtt1 = Carbon::now()->addMinutes(-180);
            $offline = Devices::where('_lastInform','<',$dtt1)->count();

        }

        

        return response()->json([
            'count' =>  $count,
            'online' => $online,
            'offline' => $offline
        ]);
    }

    public function ProductClass($id){

        $admin = Admin::find($id);
        $tag = $admin->tag;
        $Devices = Devices::raw(function ($collection) use ($tag) {
            return $collection->aggregate([
                [
                    '$match' => [
                        '_tags' => $tag
                      ]
                ],  
                [
                    '$group' => [
                        '_id' => '$VirtualParameters.model._value',
                        'count' => ['$sum' => 1]   
                     ]
                ]
               
            ]);
        });
       
        return response()->json([
            'Devices' =>  $Devices
        ]);

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
        //
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
