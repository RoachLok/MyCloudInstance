<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserLogs extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return DB::select('select * from authentication_log');
    }

    /**
     * Display a listing of the resource.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {   
        return  DB::connection('sqlite')->select('select * from municipa;');
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
