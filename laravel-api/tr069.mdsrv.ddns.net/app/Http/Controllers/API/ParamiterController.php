<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paramiter;
use DB;

class ParamiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Paramiter = Paramiter::all();

        return $Paramiter;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Paramiter::create([
            'model' => $request->data['model'],
            'mode' => $request->data['mode'],
            'name' => $request->data['name'],
            'paramiter' => $request->data['value'],
        ]);

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Paramiter = Paramiter::where('model', $id)->get();

        return $Paramiter;
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
        Paramiter::where('_id', $id)
            ->update([
                'name' => $request->data['name'],
                'value' => $request->data['value']
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
        Paramiter::where('_id',$id)->delete();

        return response()->json(['status' => 'success']);
    }
}
