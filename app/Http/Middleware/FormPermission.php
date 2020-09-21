<?php

namespace App\Http\Middleware;

use App\Form;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class FormPermission
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
        $form = Form::where([
            ['user_id', Auth::id()],
            ['id', $request->form_id]
        ])->first();


        if ($form === null){
            return redirect('/');
        }
        return $next($request);
    }
}
