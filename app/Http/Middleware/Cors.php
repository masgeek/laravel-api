<?php

namespace App\Http\Middleware;

use Barryvdh\Cors\HandleCors;
use Closure;

class Cors extends HandleCors
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {

        $headers = parent::handle($request, $next)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Expose-Headers', 'X-Total-Count')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

        return $headers;
    }
}
