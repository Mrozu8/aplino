<?php

namespace App\Http\Controllers;

use App\Form;
use App\Inbox;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{



    public function __construct(){

        $this->middleware('admin');
    }




    public function home(){
        return view('admin.home');
    }


//    ============================= lista urzytkowników ============================

    public function users(){
        $users = User::where('role', 2)->orderBy('id', 'desc')->get()->all();

        return view('admin.users', compact('users'));
    }

    public function single_user($id){
        $user = User::findOrFail($id);

        return view('admin.single-user', compact('user'));
    }

//    =========================== archiwum ================================

    public function archives(){
        $forms = Form::with('user', 'cv')->orderBy('id', 'desc')->get()->all();
        return view('admin.archives', compact('forms'));
    }


    //    ============================ inbox ============================


    public function inbox(){

        $inboxes = Inbox::with('thread')->orderBy('last_update', 'desc')->get();

        return view('admin.inbox', compact('inboxes'));
    }


    public function single_inbox($id){

        $inbox = Inbox::where('id', $id)->first();
        $threads = Thread::where('inbox_id', $id)->get();
        $user = User::where('id', $inbox->user_id)->first();

        $inbox->update(['active_support' => 0]);

        return view('admin.single-inbox', compact('inbox', 'threads', 'user'));
    }


//    =============================== settings =================================


    public function settings(){
        return view('admin.settings');
    }

    public function update_password(Request $request){

        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $admin = User::where('role', 1)->first();
        $admin->password = bcrypt($request->password);
        $admin->save();

        return back();
    }
}
