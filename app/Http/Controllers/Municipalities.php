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
        return  DB::connection('sqlite')->select('SELECT * FROM municipa WHERE (pop/area)<12.5 OR (pop<230 AND (pop/area)<15.6) ORDER BY pop;');
    }

    /**
     * List distinct AACC from municipalities.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function auco()
    {   
        return  DB::connection('sqlite')->select('SELECT DISTINCT auco FROM municipa;');
    }

    /**
     * List distinct cities from municipalities.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function city($from)
    {   
        if (strcmp($from, 'all'))
            return DB::connection('sqlite')->select('SELECT DISTINCT city FROM municipa WHERE auco = "'.$from.'";');
        
        return  DB::connection('sqlite')->select('SELECT DISTINCT city FROM municipa;');
    }

    /**
     * List distinct cities from municipalities.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function muni($from)
    {   
        if (strcmp($from, 'all'))
            return DB::connection('sqlite')->select('SELECT muni FROM municipa WHERE city = "'.$from.'";');
        
        return  DB::connection('sqlite')->select('SELECT muni FROM municipa;');
    }
}
