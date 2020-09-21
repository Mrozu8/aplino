<?php

namespace App\Http\Middleware;

use App\Transaction;
use App\User;
use Closure;

class InvoiceIsset
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
        $user = User::findOrFail($request->id);

        $invoice = Transaction::where([
            ['id', $request->invoice_id],
            ['user_email', $user->email]
        ])->first();

        if($invoice === null)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
