<?php

namespace App\Http\Middleware;

use App\Cv;
use Closure;
use Illuminate\Support\Facades\Auth;

class CvRating
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
        $cv = Cv::where([
            ['id', $request->cv_id],
            ['form_id', $request->form_id],
            ['user_id', Auth::id()]
        ])->first();

        if($cv === null)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
