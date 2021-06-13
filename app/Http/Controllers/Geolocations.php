<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class geolocations extends Controller
{
    /**
     * Display a listing of all the logging logs in the app.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $geoloc_json = shell_exec('python scripts/geolocate.py '.$request->user_id.' '.$request->count.' '.$request->items);
        
        return $geoloc_json;
    }

    /**
     * Display a listing of all the logging logs in the app.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function user_logs(Request $request)
    {   
        return DB::select('SELECT * FROM authentication_log WHERE authenticatable_id = '.$request->user()->id);
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
