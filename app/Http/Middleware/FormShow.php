<?php

namespace App\Http\Middleware;

use App\Form;
use Closure;

class FormShow
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
        $form = Form::where('id', $request->form_id)->first();

        if ($form === null){
            return redirect('/');
        }
        return $next($request);
    }
}
