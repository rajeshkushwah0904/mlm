<?php

namespace App\Http\Middleware;

use Closure;

class Permission
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

        $route = $request->route()->getAction()['as'];

        $userRole = $request->user()->id;

        $route = $request->route()->getAction()['as'];
        $sectionRoute = explode('.', $route);

        $permission = \App\Permission::where('module_name', $sectionRoute[1])->where('user_id', $userRole)->first();

        if ($sectionRoute[2] == 'create') {
            if ($permission->p_create == 1) {
                return $next($request);

            } else {
                session()->flash('error', 'You did not have enough previlage to see this page');
                return redirect()->back();

            }
        }

        if ($sectionRoute[2] == 'show') {
            if ($permission->p_create == 1) {
                return $next($request);

            } else {
                session()->flash('error', 'You did not have enough previlage to see this page');
                return redirect()->back();

            }
        }

        if ($sectionRoute[2] == 'edit') {
            if ($permission->p_create == 1) {
                return $next($request);

            } else {
                session()->flash('error', 'You did not have enough previlage to see this page');
                return redirect()->back();

            }
        }
        if ($sectionRoute[2] == 'delete') {
            if ($permission->p_create == 1) {
                return $next($request);

            } else {
                session()->flash('error', 'You did not have enough previlage to see this page');
                return redirect()->back();

            }
        }

        if ($sectionRoute[2] == 'index') {
            if ($permission->p_index == 1) {
                return $next($request);

            } else {
                session()->flash('error', 'You did not have enough previlage to see this page');
                return redirect()->back();

            }
        }

    }

    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }
}