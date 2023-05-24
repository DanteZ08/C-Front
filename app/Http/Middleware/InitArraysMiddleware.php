<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Arrays as ModelsArrays;

class InitArraysMiddleware
{
    public function handle($request, Closure $next)
    {
        ModelsArrays::init();

        return $next($request);
    }
}