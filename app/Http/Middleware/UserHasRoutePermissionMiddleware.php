<?php namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class UserHasRoutePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( $user = $request->user() )
            if( $user->getPermissionsViaRoles()->pluck('name')->contains( $request->route()->getName() ) )
                return $next($request);
            else if( !$user->getPermissionsViaRoles()->count() )
                return redirect()
                        ->route("login")
                        ->withError( "You haven't any permission." );
            else
                return redirect()
                        ->back()
                        ->withError( "You haven't permission." );
        else
            return redirect()
                    ->route("login")
                    ->withError( "You haven't session." );;
    }
}