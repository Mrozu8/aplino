<?php

namespace App\Http\Controllers;

use App\Inbox;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('permission');
    }


    public function question_company(Request $request, $id){


        $this->validate($request,[
            'topic' => 'required',
            'question' => 'required',
        ],[
            'required' => 'To pole jest wymagane',
        ]);


        $inbox = Inbox::create([
            'user_id' => $id,
            'topic' => $request->topic,
            'active_support' => 1,
            'last_update' => now(),
        ]);

        Thread::create([
            'inbox_id' => $inbox->id,
            'thread_id' => 1,
            'sender' => $id,
            'content' => $request->question,
        ]);

        return back()->with('status-success', 'Wiadomość została wysłana');
    }


//    ====================== odpowiedź na zgłoszenie / company ============================


    public function question_thread_company(Request $request, $id, $inbox_id){

        $this->validate($request,[
            'answer' => 'required',
        ],[
            'required' => 'To pole jest wymagane',
        ]);


        $last_thread = Thread::where('inbox_id', $inbox_id)->orderBy('thread_id', 'desc')->first();

        $new_thread = Thread::create([
            'inbox_id' => $inbox_id,
            'thread_id' => $last_thread->thread_id + 1,
            'sender' => Auth::id(),
            'content' => $request->answer,
        ]);

        Inbox::where([
            ['id', $inbox_id],
            ['user_id', Auth::id()]
        ])->update(['active_support' => 1, 'last_update' => $new_thread->created_at]);

        return back()->with('status-success', 'Wiadomość została wysłana');
    }


//    =================================== admin inbox ==============================================


    public function question_admin(Request $request, $id){

        $inbox = Inbox::create([
            'user_id' => $id,
            'topic' => $request->topic,
            'active_user' => 1,
            'last_update' => now(),
        ]);

        Thread::create([
            'inbox_id' => $inbox->id,
            'thread_id' => 1,
            'sender' => 'support',
            'content' => $request->question,
        ]);

        return back();
    }


    public function question_thread_admin(Request $request, $id){

        $last_thread = Thread::where('inbox_id', $id)->orderBy('thread_id', 'desc')->first();

        $new_thread = Thread::create([
            'inbox_id' => $id,
            'thread_id' => $last_thread->thread_id + 1,
            'sender' => 'support',
            'content' => $request->answer,
        ]);

        Inbox::where('id', $id)->update(['active_user' => 1, 'last_update' => $new_thread->created_at]);

        return back();
    }

//    ======================================= wiadomość do wszystkich od supportu ==================================


    public function send_all(Request $request){

    }


}
