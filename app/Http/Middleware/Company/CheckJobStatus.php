<?php

namespace App\Http\Middleware\Company;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckJobStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next){
        $company = auth('company')->user();
        if ($company->details->status_id === 14) {
            return $next($request);
        }
        return redirect()->route('company.details.detail')->with(['message'=>'Please complete your profile before posting a job.','class'=>'error', 'error' => true]);
    }
}
