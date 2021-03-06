<?php namespace App\Http\Middleware;

use Redirect, Closure;
use Illuminate\Contracts\Routing\Middleware;

class HttpsProtocol implements Middleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!$request->secure() && env('APP_ENV') === 'prod') {
			return Redirect::secure($request->getRequestUri());
		}

		return $next($request);
	}

}
