<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;


$crone = new CroneStatusController();
$crone->crone();

class CroneStatusController
{
    public function crone()
    {
        $users = User::select('id', 'status', 'status_close')->where('status', '!=', null)->get();

        $date = Carbon::yesterday();

        foreach ($users as $user) {
            if ($date > $user->status_close) {
                User::where('id', $user->id)->update(['status' => null, 'status_close' => null]);
            }
        }

        return back();

        // Add comment
    }
}