<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Form;
use App\Inbox;
use App\Mail\ChangePass;
use App\Thread;
use App\Transaction;
use App\User;
use App\BusinessCard;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\ArrayToXml\ArrayToXml;

use PDF;

class CompanyController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('confirmMail');
        $this->middleware('permission');
        $this->middleware('cvRating')->only('single_cv_archives');
        $this->middleware('inboxIsset')->only('single_inbox');
      }


//    ===================== pierwsza strona panelu klienta =======================

    public function show($id){

        $company = User::findOrFail($id);

        $cv_active = Cv::where([
            ['user_id', $id],
            ['active', 1],
        ])->count();

        $cv_all = Cv::where([
            ['user_id', $id],
        ])->count();



        $inbox = Inbox::where([
            ['user_id', $id],
            ['active_user', 1]
        ])->count();

        $forms = Form::select('id', 'active', 'active_date')->with('cv')->where([
            ['user_id', Auth::id()],
            ['active_date', '!=', null],
        ])->paginate(3);




        return view('company.dashboard', compact('company', 'cv_active', 'cv_all', 'inbox', 'forms'));
    }



//    ====================== Formularze klienta ==============================

    public function form($id){

        $active_forms = Form::with('cv')->where('user_id', $id)->orderBy('id', 'desc')->paginate(4);

//        dd($active_forms);

        $id_form = 1;
        $id_cv = 1;

        $company = User::select('company_name')->where('id', $id)->first();

        $cvs = Cv::where([
            ['user_id', $id],
            ['active', 1],
        ])->paginate(8);


        return view('company.my-form', compact('active_forms', 'id_form', 'id_cv', 'cvs', 'company'));
    }


//===================================== archiwum =================================

    public function archives(Request $request, $id){

        $new = $request->new;
        $old = $request->old;
        $search = $request->search;

        $id_form = 1;
        $cv = count(Cv::where('user_id', $id)->get());

        if($search || $new || $old){

            $forms = Form::with('cv')->when($search, function ($query) use ($search) {
                return $query->where([
                    ['title', 'like', '%'. $search .'%'],
                    ['user_id', Auth::id()],
                ]);
            })

                ->when($new, function ($query) use ($new) {
                    return $query->where([
                        ['user_id', Auth::id()],
                    ])->orderBy('id', 'desc');
                })

                ->when($old, function ($query) use ($old) {
                    return $query->where([
                        ['user_id', Auth::id()],
                    ])->orderBy('id', 'asc');
                })
                ->paginate(10)->appends(request()->query());

            return view('company.archives', compact('forms', 'id_form', 'cv'));
        }
        else{
            $forms = Form::with('cv')->where('user_id', $id)->paginate(10);

            return view('company.archives', compact('forms', 'id_form', 'cv'));
        }
    }

//    ================================= archiwum->single_form ==============================

    public function single_form_archives(Request $request, $id, $form_id){

        $new = $request->new;
        $old = $request->old;
        $search = $request->search;
        $important = $request->important;
        $best = $request->best;

        $archive_id = 1;



        if($search || $new || $old || $important || $best){


            $cvs = Cv::where('form_id', $form_id)->when($search, function ($query) use ($search) {
                return $query->where([
                    ['email', 'like', '%'. $search .'%'],
                    ['user_id', Auth::id()],
                ]);
            })

                ->when($new, function ($query) use ($new) {
                    return $query->where([
                        ['user_id', Auth::id()],
                    ])->orderBy('id', 'desc');
                })

                ->when($old, function ($query) use ($old) {
                    return $query->where([
                        ['user_id', Auth::id()],
                    ])->orderBy('id', 'asc');
                })

                ->when($important, function ($query) use ($important) {
                    return $query->where([
                        ['user_id', Auth::id()],
                        ['important', 1],
                    ])->orderBy('id', 'desc');
                })

                ->when($best, function ($query) use ($best) {
                    return $query->where([
                        ['user_id', Auth::id()],
                    ])->orderBy('rating', 'desc');
                })
                ->paginate(20)->appends(request()->query());

            return view('company.single-archives', compact('cvs', 'archive_id', 'form_id'));
        }
        else{
            $cvs = Cv::where([
                ['form_id', $form_id],
                ['user_id', Auth::id()]
            ])->paginate(20);

            return view('company.single-archives', compact('cvs', 'archive_id', 'form_id'));
        }
    }


//    ==================================== pojedyncze cv w archiwum ========================


    public function single_cv_archives($id, $form_id, $cv_id){


        $cv = Cv::findOrFail($cv_id);
        $cv->active = 0;
        $cv->save();


        return view('company.single-archives-cv', compact('cv'));
    }


//    ==================== przewijanie cv w archiwum =========================

    public function single_cv_archives_next($id, $form_id, $cv_id){


        $cv_list = Cv::select('id')->where('form_id', $form_id)->get();


        foreach($cv_list as $key => $val)
        {
            if($cv_id < $val->id)
            {
                $cv = Cv::where([
                    ['form_id', $form_id],
                    ['id', $val->id]
                ])->first();

                $cv->active = 0;
                $cv->save();

                return view('company.single-archives-cv', compact('cv'));
            }

        }

        $cv = Cv::where([
            ['form_id', $form_id],
            ['id', $cv_id]
        ])->first();


        return view('company.single-archives-cv', compact('cv'));
    }


    public function single_cv_archives_previous($id, $form_id, $cv_id){


        $cv_list = Cv::select('id')->where('form_id', $form_id)->orderBy('id', 'desc')->get();

//        dd($cv_list);

        foreach($cv_list as $key => $val)
        {
            if($cv_id > $val->id)
            {
                $cv = Cv::where([
                    ['form_id', $form_id],
                    ['id', $val->id]
                ])->first();

                $cv->active = 0;
                $cv->save();

                return view('company.single-archives-cv', compact('cv'));
            }

        }

        $cv = Cv::where([
            ['form_id', $form_id],
            ['id', $cv_id]
        ])->first();

        return view('company.single-archives-cv', compact('cv'));
    }



    //    ================================= group form cv XML ==============================

    public function group_cv_xml($id, $form_id)
    {
        $cvs = Cv::where([
            ['user_id', Auth::id()],
            ['form_id', $form_id],
        ])->get();

        $form = Form::select('title')->where('id', $form_id)->first();

        $i = rand(1, 10);

        $array = [
            'form' => [
                '_attributes' => ['id' => $form_id, 'title' => $form->title],

//                'cv' => [
//                    '_attributes' => [],
//
//                    'pola_glowne' => [],
//
//                    'reszta' => [],
//                    ],
            ],
        ];


        foreach($cvs as $cv)
        {
            $array['form']['cv'.$cv->id]['_attributes'] = ['cv_id' => $cv->id];

            $array['form']['cv'.$cv->id]['pola_glowne'] = [
                    'Name' => $cv->name,
                    'Surname' => $cv->surname,
                    'Email' => $cv->email,
                    'Phone' => $cv->phone
            ];

            foreach($cv->content as $key => $value)
            {


                $array['form']['cv'.$cv->id]['reszta'][$key] = [
                    'odp' => $value,
                ];
            }

        }


        $result = ArrayToXml::convert($array, [
            'rootElementName' => 'i-CV'
        ], true, 'UTF-8');

        Storage::put('public/group-xml/file'.$i.'.xml', $result);
        return Storage::download('public/group-xml/file'.$i.'.xml');
    }


//    ================================= single cv XML ==============================

    public function single_cv_xml($id, $form_id, $cv_id)
    {
        $cv = Cv::where([
            ['user_id', Auth::id()],
            ['form_id', $form_id],
            ['id', $cv_id]
        ])->first();

        $i = rand(1, 10);

        $array = [
            'form' => [
                '_attributes' => ['id' => $form_id, 'cv_id' => $cv->id],

                'Pola główne' => [
                    'Name' => $cv->name,
                    'Surname' => $cv->surname,
                    'Email' => $cv->email,
                    'Phone' => $cv->phone,
                ],

                'reszta' => [],
            ]
        ];

        foreach($cv->content as $key => $value)
        {
            $array['form']['reszta'][$key] = [
                'odp' => $value,
            ];
        }

        $result = ArrayToXml::convert($array, [
            'rootElementName' => 'i-CV'
        ], true, 'UTF-8');


        Storage::put('public/xml/file'.$i.'.xml', $result);
        return Storage::download('public/xml/file'.$i.'.xml');
    }


//    ======================================= inbox ============================================



    public function inbox(Request $request, $id){

        $new = $request->new;
        $old = $request->old;
        $search = $request->search;


        if($search || $new || $old){

            $inboxes = Inbox::with('thread')->when($search, function ($query) use ($search) {
                return $query->where([
                    ['topic', 'like', '%'. $search .'%'],
                    ['user_id', Auth::id()],
                ]);
            })

                ->when($new, function ($query) use ($new) {
                    return $query->where([
                        ['user_id', Auth::id()],
                    ])->orderBy('id', 'desc');
                })

                ->when($old, function ($query) use ($old) {
                    return $query->where([
                        ['user_id', Auth::id()],
                    ])->orderBy('id', 'asc');
                })
                ->paginate(5)->appends(request()->query());

            return view('company.inbox', compact('inboxes'));
        }
        else{

            $inboxes = Inbox::with('thread')->where('user_id', Auth::id())->orderBy('last_update', 'desc')->paginate(5);
            return view('company.inbox', compact('inboxes'));
        }
    }


    public function single_inbox($id, $inbox_id){

        $inbox = Inbox::where([
            ['id', $inbox_id],
            ['user_id', Auth::id()]
        ])->first();
        $threads = Thread::where('inbox_id', $inbox_id)->get();
        $user = User::findOrFail(Auth::id());

        $inbox->update(['active_user' => 0]);

        return view('company.single-inbox', compact('threads', 'inbox', 'user'));
    }






//    ======================================== ustawienia konta =================================


    public function settings($id){

        $company = User::findOrFail($id);
        $businessCard = BusinessCard::where('user_id', $id)->first();

        if($businessCard == null){
            $businessCard = BusinessCard::create([
                'user_id' => $id,
            ]);
        }


        return view('company.settings', compact('company', 'businessCard'));
    }

    public function update_data(Request $request, $id){



        $user = User::findOrFail(Auth::id());

        $user->company_name = $request->company_name;
        $user->address = $request->address;
        $user->name = $request->name;
//        $user->phone = $request->phone;
        $user->nip = $request->nip;
//        $user->website = $request->website;
//        $user->description = $request->description;

        if(isset($request->period_email))
        {
            $user->period_email = 1;
        }
        else
        {
            $user->period_email = 0;
        }

        $user->save();

        return back()->with('status-success', 'Zmiany zostały zapisane');
    }


//    public function active_businessCard(Request $request, $id){
//        $businessCard = BusinessCard::where('user_id', $id)->first();
//        $businessCard->active = $request->active;
//        $businessCard->save();
//        return back()->with('status-success', 'Zmiany zostały zapisane');
//    }
//
//
//    public function update_require_info(Request $request, $id){
//
//        $basic_inputs = ['company_name', 'address', 'phone', 'email', 'website', 'description']; //pola podstawowe w formularzu
//        $x = false;
//
//
//        if($request->basic){
//            foreach($basic_inputs as $basic){
//                foreach ($request->basic as $key => $value){
//
//                        if($basic === $key){
//                           $x = true;
//                        }
//                    }
//
//                    if($x === true){
//                        BusinessCard::where('user_id', $id)->update([$basic => 1]);
//                    }
//                    else{
//                        BusinessCard::where('user_id', $id)->update([$basic => 0]);
//                    }
//                     $x = false;
//                }
//            }
//            else{
//                foreach($basic_inputs as $basic){
//                    BusinessCard::where('user_id', $id)->update([$basic => 0]);
//                }
//            }
//
//
//
//        return back()->with('status-success', 'Zmiany zostały zapisane');
//    }


    public function update_password_email(Request $request, $id){

        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $user = User::findOrFail(Auth::id());
        $password = str_replace('/', '', bcrypt($request->password));

//        dd($password);

        Mail::to($user->email)->send(new ChangePass($user, $password));

        return back()->with('status-success', 'Na twoją pocztę został wysłany email z linkiem potwierdzającym');
    }



    public function update_password(Request $request, $id, $hash){


        if(isset($hash) && !empty($hash))
        {
            $user = User::findOrFail($id);
            $user->password = $hash;
            $user->save();

            return back()->with('status-success', 'Hasło zostało zmienione');
        }
        else
        {
            return back()->with('status-error', 'Hasło nie zostało zmienione - spróbuj ponownie');
        }
    }



//    ================================ płatonści ====================================


    public function payment($id){

        $user = User::findOrFail($id);

        $transactions = Transaction::where('user_email', $user->email)->orderBy('id', 'desc')->paginate(5);

        return view('company.payment', compact('transactions', 'user'));
    }





    public function invoice_download($id, $invoice_id){

        $user = User::find($id);

//        dd($user);

        if(!empty($user->address) && !empty($user->name) && !empty($user->nip))
        {
            $tr = Transaction::where('id', $invoice_id)->first();

            if($tr->tr_type == 1){
                $price = 12;
            }
            elseif($tr->tr_type == 2){
                $price = 27;
            }
            else{
                $price = 45;
            }



            $pdf = PDF::loadView('company.pdf', compact('user', 'tr', 'price'));
            return $pdf->download('invoice.pdf');
        }
        else
        {
            return dd('brak wymaganych danych / do robienia notyfikacji');
        }
    }



    public function information($id)
    {
        return view('company.information');
    }
}





