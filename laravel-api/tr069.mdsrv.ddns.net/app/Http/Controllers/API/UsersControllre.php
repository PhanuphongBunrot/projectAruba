<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Crypt;
class UsersControllre extends Controller
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
        $Admin = Admin::all();

        return $Admin;
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
        
        $admin = Admin::find($id);
        
        if($admin->role === 'root'){
            $Admin_return = Admin::all();
        }else{
            $Admin_return = Admin::where('tag', $admin->tag)->get();
        }

        return Crypt::encryptString($Admin_return);
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
        Admin::where('_id', $id)
        ->update([
            'name' => $request->data['name'],
            'email' => $request->data['email'],
            'role' => $request->data['role'],
            'status' => $request->data['status'],
            'tag' => $request->data['tag'],
            'password' => bcrypt($request->data['password'])
        ]);
    return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('_id',$id)->delete();

        return response()->json(['status' => 'success']);
    }
}
