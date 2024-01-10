<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class LayoutMiddleware
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
        $theme = ['normal','fix-header','mini-sidebar'];
        if(isset(request()->theme)){
            if($request->isMethod('get') && in_array($request->theme,$theme)){
                Session::put('theme-layout',str_slug(request()->theme,'-'));
            }else{
                //dd($request->path());
                $query = $request->query();
                Session::put('theme-layout','normal');
            }
            return back();

        }else{
            if(!session()->has('theme-layout')){
                Session::put('theme-layout','normal');
            }
        }
        //session()->save();
        return $next($request);
    }
}
