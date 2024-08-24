<?php

namespace FredLabs\BusinessUnits\Middlewares;

use Closure;
use Illuminate\Support\Facades\Auth;

class BusinessUnitMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        //pass in header from frontend or get from current user
        $businessUnitId = $request->header('business_unit_id');

        if (!$businessUnitId && $user) {
            $businessUnitId = $user->business_unit_id;
        }

        if ($businessUnitId) {
            app()->instance('current_business_unit_id', $businessUnitId);
        }

        return $next($request);
    }
}
