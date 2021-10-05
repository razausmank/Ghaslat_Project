<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class isPosUser
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
        $role = Role::where('label', 'pos_user')->first();
        if (auth()->user()->roles->contains('id', $role->id)) {
            return $next($request);
        }

        return response(view('error', [
            'response_code' => 403,
            'response_text' => 'ERROR',
            'response_message' => 'Sorry you are not allowed to view this Page'
        ]), 403);
    }
}
