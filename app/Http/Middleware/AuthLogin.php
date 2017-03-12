<?php
namespace App\Http\Middleware;

use Closure;

class AuthLogin
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('logged_user') == null) 
        {
			return redirect('login');   
		}
		
        return $next($request);
    }

}