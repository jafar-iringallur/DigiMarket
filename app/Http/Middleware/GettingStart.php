<?php

namespace App\Http\Middleware;

use App\Http\Controllers\HomeController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GettingStart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ( $this->onBoardStatus($user) != 1 ) {
            return redirect('/getting-started');
        }
        return $next($request);
    }

    protected function onBoardStatus($user){
        $controller = new HomeController();
        $status = $controller->getOnboardStatus();
        if($status != 10){
           return 0;
        }
        return 1;
    }
}
