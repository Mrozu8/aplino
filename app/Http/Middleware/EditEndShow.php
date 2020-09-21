<?php

namespace App\Http\Middleware;

use App\Form;
use Closure;
use Illuminate\Support\Facades\Auth;

class EditEndShow
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

        if ($form === null || $form->edit == 1)
        {
            if(Auth::check())
            {
                return redirect()->route('company-form', Auth::id())->with('status-error', 'Formularz nie został zatwierdzony');
            }
            else
            {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
