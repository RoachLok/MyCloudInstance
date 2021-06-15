<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \int user_id     ->  user_id of the requesting user.
     * @param  \str token_name  ->  Token name given by user on token creation.
     * @param  \str token       ->  Private token given to the user on token creation.
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token_query = DB::connection('sqlite')->select('SELECT token FROM personal_access_tokens WHERE tokenable_id = '.$request->user_id.' AND name = '.$request->token_name.';');
        
        if (strcmp($token_query, $request->token))
            return $next($request);
    }
}
