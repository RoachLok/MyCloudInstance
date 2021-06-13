<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Municipalities extends Controller
{
    /**
     * Display a listing of all municipalities.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return  DB::connection('sqlite')->select('SELECT * FROM municipa;');
    }

    /**
     * Display a listing of the municipalities.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function despo()
    {   
        return  DB::connection('sqlite')->select('select * from municipa where (pop/area)<12.5 or (pop<230 and (pop/area)<15.6) order by pop;');
    }
}
