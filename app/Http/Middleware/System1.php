<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\System;
class System1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $systems = System::all();
        $system_list =array();

        foreach ($systems as $key => $value) {
            $system_list[$value->key] = $value->value;
        }

        $request->session()->put('system_list', $system_list);
        return $next($request);
    }
}
