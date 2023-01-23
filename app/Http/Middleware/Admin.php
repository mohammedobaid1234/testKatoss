<?php

namespace App\Http\Middleware;

use App\Models\Admin as ModelsAdmin;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='admin')
    {
        $conditions = ['email' => $request->email, 'password' => $request->password];
        dd( \Auth::guard('admin')->once($conditions));
        if(!\Auth::guard($guard)->check()){
            return response(['message' =>'Not Allow Access'],403);
            // return redirect('admin/login');
        }
        return $next($request);
    }
}
