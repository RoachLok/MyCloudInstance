<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 /**
 * @OA\Info(
 *      version="1.0.0",
 *      title="My Cloud Instance API Documentation",
 *      description="My Cloud Instance is a cloud computing platform for instance hosting, cloud shell's and coding resources.",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 *
 * @OA\Tag(
 *     name="Projects",
 *     description="API Endpoints of Projects"
 * )
 */

 /**
 * @OA\Get(
 *     path="/",
 *     tags={"Path Routes"},
 *     description="Home page",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */
 /**
 * @OA\Get(
 *     path="/about",
 *     tags={"Path Routes"},
 *     description="About page",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */
 /**
 * @OA\Get(
 *     path="/gnu",
 *     tags={"Path Routes"},
 *     description="Gnu page",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */
 /**
 * @OA\Get(
 *     path="/education",
 *     tags={"Path Routes"},
 *     description="Education page",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */
 /**
 * @OA\Get(
 *     path="/cursojava",
 *     tags={"Path Routes"},
 *     description="Java course page",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */
 /**
 * @OA\Get(
 *     path="/tutorial",
 *     tags={"Path Routes"},
 *     description="Tutorial page",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */
 /**
 * @OA\Get(
 *     path="/email/verify",
 *     tags={"Verified Path Routes"},
 *     summary="Get verified email.",
 *     description="Tutorial page",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */
/**
 * @OA\Get(
 *      path="/email/verify/{id}/{hash}",
 *      operationId="verification.verify",
 *      tags={"Verified Path Routes"},
 *      summary="Get verified email hash.",
 *      description="Returns login logs data. It requests data from all possible user login logs. This call can only be made by users of the admin type, since this data is sensitive and will only be accessible to authorized users.",
 *      @OA\Parameter(
 *          name="id",
 *          description="id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="hash",
 *          description="hash",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not verified",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */

 /**
 * @OA\Get(
 *     path="/email/verification-notification",
 *     tags={"Verified Path Routes"},
 *     summary="Get verified email notification.",
 *     description="verified email",
 *     @OA\Response(response="200", description="Successful operation")
 * )
 */

 /**
 * @OA\Get(
 *     path="/user/mapview",
 *     tags={"Admin Path Routes"},
 *     summary="Shows the mapview in the user dashboard",
 *     description="Requests the view of the map of Spain for the user and to be able to make the different queries about the autonomous communities, municipalities and cities.",
 *     @OA\Response(response="200", description="Successful operation"),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not admin",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */



/**
 * @OA\Get(
 *      path="/login_logs/{test}",
 *      operationId="index",
 *      tags={"User Logs Data Queries"},
 *      summary="Get login logs.",
 *      description="Returns login logs data. It requests data from all possible user login logs. This call can only be made by users of the admin type, since this data is sensitive and will only be accessible to authorized users.",
 *      @OA\Parameter(
 *          name="test",
 *          description="test id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not admin",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */
/**
 * @OA\Get(
 *      path="/list_users",
 *      operationId="list_users",
 *      tags={"User Logs Data Queries"},
 *      summary="Get user lists",
 *      description="Returns a list with all users registered in our internal database",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not admin",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */
/**
 * @OA\Get(
 *      path="/login_logs",
 *      operationId="user_logs",
 *      tags={"User Logs Data Queries"},
 *      summary="Get login logs from the requesting user",
 *      description="Returns login logs data. It requests data from the requesting user login logs. This call can only be made by users of the verified type, since this data is sensitive and will only be accessible to verified users.",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not verified",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */
/**
 * @OA\Get(
 *      path="/municipalities",
 *      operationId="index",
 *      tags={"Municipalities Data Queries"},
 *      summary="Get municipalities from the request",
 *      description="Returns a list with all the municipalities that are stored in our external database municipalities.db",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not verified",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */

/**
 * @OA\Get(
 *      path="/despo_muni",
 *      operationId="despo",
 *      tags={"Municipalities Data Queries"},
 *      summary="Get depopulated municipalities from the request",
 *      description="Returns a list with all the depopulated municipalities that are stored in our external database municipalities.db",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not verified",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */

/**
 * @OA\Get(
 *      path="/get_ac",
 *      operationId="auco",
 *      tags={"Municipalities Data Queries"},
 *      summary="Get autonomous communities from the request",
 *      description="Returns a list with all the autonomous communities that are stored in our external database municipalities.db",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not verified",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */

/**
 * @OA\Get(
 *      path="/get_city/{from}",
 *      operationId="city",
 *      tags={"Municipalities Data Queries"},
 *      summary="Get cities from the selected autonomous community",
 *      description="Returns city data. It requests data of the selected city from the selected autonomous community. This call can only be made by users of the verified type, since this data is sensitive and will only be accessible to authorized users.",
 *      @OA\Parameter(
 *          name="from",
 *          description="autonomous community id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not verified",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */

/**
 * @OA\Get(
 *      path="/get_muni/{from}",
 *      operationId="muni",
 *      tags={"Municipalities Data Queries"},
 *      summary="Get municipalities from the selected city",
 *      description="Returns municipalities data. It requests data of the selected municipality from the selected city. This call can only be made by users of the verified type, since this data is sensitive and will only be accessible to authorized users.",
 *      @OA\Parameter(
 *          name="from",
 *          description="city id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not verified",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */
 

/**
 * @OA\Get(
 *      path="/login_locs",
 *      operationId="index",
 *      tags={"Municipalities Data Queries"},
 *      summary="Get login logs from all the users",
 *      description="Returns a list with all the login logs of all users with their corresponding geolocation data",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Not admin",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 * )
 */

class UserLogs extends Controller
{
   

    /**
     * Display a listing of all the logging logs in the app.
     * 
     * All user login logs
     *
     * @return \Illuminate\Http\Response
     */
    public function index($test = 'all')
    {   
        if (strcmp($test, 'all'))
            return DB::select('SELECT * FROM authentication_log WHERE authenticatable_id = '.$test);
        
        return DB::select('SELECT * FROM authentication_log');
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
     * Display a listing of all application users.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function list_users()
    {   
        return DB::select('SELECT id, name FROM users;');
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
