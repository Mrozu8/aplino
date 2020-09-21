<?php

namespace App\Http\Middleware;

use App\Inbox;
use Closure;
use Illuminate\Support\Facades\Auth;

class InboxIsset
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
        $inbox = Inbox::where([
            ['id', $request->inbox_id],
            ['user_id', Auth::id()]
        ])->first();

        if($inbox === null)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
