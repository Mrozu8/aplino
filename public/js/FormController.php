<?php

namespace App\Http\Controllers;

use App\Checkbox;
use App\CustomField;
use App\Cv;
use App\Form;
use App\Radio;
use App\Mail\NewCV;
use App\User;
use App\BusinessCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{



    public function __construct(){

        $this->middleware('auth')->except(['show_cv', 'create_cv']);
		$this->middleware('confirmMail')->except(['show_cv', 'create_cv']);
        $this->middleware('formPermission')->except(['form_create','show_cv', 'create_cv']);
        $this->middleware('formShow')->except('form_create');
        $this->middleware('editEnd')->only(['form_show', 'create_input', 'basic_input', 'show_pre_cv', 'custom_input_delete']);
        $this->middleware('editEndShow')->only('show_cv');

    }




//    ======================= dodawanie nowych formularzy =========================

    public function form_create(Request $request, $id){

        $this->validate($request,[
            'profession' => 'required',
            'title' => 'required',
            'voi' => 'required',
            'street' => 'required',
            'city' => 'required',
            'company' => 'required'
        ],[
            'required' => 'To pole jest wymagane',
        ]);

        $form = Form::create([
            'user_id' => Auth::id(),
            'profession' => $request->profession,
            'title' => $request->title,
            'voi' => $request->voi,
            'street' => $request->street,
            'city' => $request->city,
            'description' => $request->desc,
            'company' => $request->company,
            'active' => 0,
        ]);

        return redirect()->route('form-show', [Auth::id(), $form->id])->with('status-success', 'Stworzyłeś formularz');

    }

    //    ======================= wyświetlanie edycji formularza  =========================

    public function form_show($id, $form_id){

        $form = Form::findOrFail($form_id);
        $customs = CustomField::with('radio', 'checkbox')->where('form_id', $form_id)->get();


        return view('form.show', compact('form', 'customs'));

    }


    public function create_input(Request $request, $id, $form_id){

//        dd($request);

        $slug = str_slug($request->name);

        $custom = CustomField::create([
            'name' => $request->name,
            'form_id' => $form_id,
            'slug' => $slug,
            'type' => $request->type,
        ]);

        if($request->type == 3){
            foreach($request->radio as $content){
                Radio::create([
                    'custom_field_id' => $custom->id,
                    'form_id' => $form_id,
                    'content' => $content,
                ]);
            }
        }

        if($request->type == 4){
            foreach($request->checkbox as $content){
                Checkbox::create([
                    'custom_field_id' => $custom->id,
                    'form_id' => $form_id,
                    'content' => $content,
                ]);
            }
        }

        return back()->with('status-success', 'Pole zostało dodane');
    }


//    ================================= update podstawowych pól formularza ===========================

    public function basic_input(Request $request, $id, $form_id){

        

        $basic_inputs = ['name', 'surname', 'birthday', 'file', 'email', 'phone']; //pola podstawowe w formularzu
        $x = false;

        if($request->basic){
            foreach($basic_inputs as $basic){
                foreach ($request->basic as $key => $value){

                        if($basic === $key){
                           $x = true;
                        }
                    }

                    if($x === true){
                        Form::where('id', $form_id)->update([$basic => 1]);
                    }
                    else{
                        Form::where('id', $form_id)->update([$basic => 0]);
                    }
                     $x = false;
                }
            }
            else{
                foreach($basic_inputs as $basic){
                    Form::where('id', $form_id)->update([$basic => 0]);
                }
            }



        return back()->with('status-success', 'Zmiana została zapisana');
    }


    // ================================ Update formularza =========================

    public function update_form(Request $request, $id, $form_id){



        $tab = $request->slug;

       if($tab){
           foreach ($tab as $key => $value){
               CustomField::where([
                   ['form_id', $form_id],
                   ['id', $key],
               ])->update(['name' => $value, 'slug' => str_slug($value)]);
           }
       }

        if($request->radio){                                  //////////////////czy istnieje ?
            $radio = $request->radio;

            foreach ($radio as $key => $value){
                Radio::where([
                    ['id', $key],
                    ['form_id', $form_id],
                ])->update(['content' => $value]);
            }
        }

        if($request->check){                                  //////////////////czy istnieje ?
            $check = $request->check;

            foreach ($check as $key => $value){
                Checkbox::where([
                    ['id', $key],
                    ['form_id', $form_id],
                ])->update(['content' => $value]);
            }
        }

        return back()->with('status-success', 'Zmiany zostały zapisane');
    }


//    ==================================== usuwanie pól formularza ====================================


    public function custom_input_delete(Request $request, $id, $form_id){
//        dd($request);

        if($request->mine_input){
            CustomField::where('id', $request->mine_input)->delete();
        }
        elseif($request->radio){
            Radio::where('id', $request->radio)->delete();
        }
        elseif($request->checkbox){
            Checkbox::where('id', $request->checkbox)->delete();
        }

        return back()->with('status-success', 'Pole zostało usunięte');
    }
    
    
    
    //    ===================== zatwierdzanie formularza ================
    
    public function edit_end(Request $request, $id, $form_id)
    {
        if(isset($request))
        {
            Form::where([
                        ['id', $form_id],
                        ['user_id', Auth::id()]
                        ])->update(['edit' => 0]);
        }
        
        return redirect()->route('company-form', $id)->with('status-success', 'Formularz został zatwierdzony');
        
    }


//    ======================================= Show gotowego do wypełnienia CV =====================


    public function show_cv($company_name, $form_id){
		
        $form = Form::with('user')->where('id', $form_id)->first();

        if($form->active == 1)
        {
            $customs = CustomField::with('radio', 'checkbox')->where('form_id', $form_id)->get();
            return view('form.cv', compact('form', 'customs', 'business_card'));

        }

        if(Auth::check())
        {
            return back()->with('status-error', 'Widoczność formularza jest obecnie wyłączona');
        }
        else
        {
            return redirect('/');
        }
    }

	
	
	//    ======================================== podgląd gotowego cv ====================

    public function show_pre_cv($company_name, $form_id){

        $form = Form::with('user')->where('id', $form_id)->first();
        $customs = CustomField::with('radio', 'checkbox')->where('form_id', $form_id)->get();

        return view('form.pre-cv', compact('form', 'customs'));
    }


//    ====================================== Tworzenie wysłanego CV ==================================


    public function create_cv(Request $request, $form_id){
        

        $user = Form::with('user')->where('id', $form_id)->first();

        $last_cv_id = Cv::where('form_id', $form_id)->orderBy('group_cv_id', 'DESC')->first();
		
		
		$this->validate($request, [
            'basic.*' => 'required',
            'rule' => 'required',
            'g-recaptcha-response' => 'required'

        ],[
            'required' => 'To pole jest wymagane',
        ]);

        if($last_cv_id == null){
            $group_cv_id = 1;
        }
        else{
            $group_cv_id = $last_cv_id->group_cv_id + 1;
        }

       // dd($group_cv_id);

        $req = $request->request;
        $custom_tab = [];

        foreach($req as $key => $value){
            if($key !== '_token' && $key !== '_method' && $key !== 'basic' && $key !== 'file'){
                $custom_tab[$key] =  $value;
            }
        }
        
        
        if($request->file){
            $shop_avatar_path = 'public/form/'.$form_id;
            $upload_path = $request->file('file')->store($shop_avatar_path);
            $avatar_filename = str_replace($shop_avatar_path . '/', '', $upload_path);
        }
        else{
            $avatar_filename = null;
        }

        

        $cv = Cv::create([
            'form_id' => $form_id,
            'user_id' => $user->user->id,
            'group_cv_id' => $group_cv_id,
            'content' => $custom_tab,
            'file' => $avatar_filename,
            'active' => 1,
        ]);


       if($request->basic){
           foreach($request->basic as $key => $value){
               Cv::where('id', $cv->id)->update([$key => $value]);
           }
       }
        
        
        
        $id = $user->user->id;

        if($user->user->period_email == 1)
        {
            Mail::to($user->user->email)->send(new NewCV($id));
        }
        
    
        return back()->with('status-success', 'Formularz został wysłany');
    }



//    ======================================== Ocena zgłoszonego cv ==============================


    public function cv_rating(Request $request, $id, $form_id, $cv_id){
//        dd($request);

      if(Auth::id() == $id){
          $cv = Cv::findOrFail($cv_id);

          if($request->note){
              $cv->note = $request->note;
          }
          else{
              $cv->note = null;
          }

          if($request->rating){
              $cv->rating = $request->rating;
          }
          else{
              $cv->rating = null;
          }

          if($request->important == 'on'){
              $cv->important = 1;
          }
          else{
              $cv->important = null;
          }

          $cv->save();
      }


        return back()->with('status-success', 'Zmiany zostały zapisane');

    }
	
	
	
	//    ================================== aktywacja formularza ===================

    public function active_form($id, $form_id)
    {
        $user = User::select('package')->where('id', Auth::id())->first();
        $form = Form::select('active_date')->where([
            ['id', $form_id],
            ['user_id', Auth::id()]
        ])->first();


        if($user->package == 0 || $user->package == null)
        {
            return back()->with('status-error', 'Aby aktywować lub przedłużyć ważnośc formularza musisz wykupić pakiet');
        }
        else
        {
            if($form->active_date != null)
            {
                if($form->active_date <= Carbon::now()){
                    $date = Carbon::now();
                    $date = $date->addMonths(1);
                }
                else
                {
                    $date = new Carbon($form->active_date);
                    $date = $date->addMonths(1);
                }

                $form = Form::where([
                    ['id', $form_id],
                    ['user_id', Auth::id()]
                ])->update(['active_date' => $date]);

                $package = $user->package - 1;
                User::where('id', Auth::id())->update(['package' => $package]);

                return back()->with('status-success', 'Ważność formularza została wydłużona o 1 miesiąc');
            }
            else
            {
                $date = Carbon::now();
                $date->addMonths(1);

                $form = Form::where([
                    ['id', $form_id],
                    ['user_id', Auth::id()]
                ])->update(['active_date' => $date]);


                $package = $user->package - 1;
                User::where('id', Auth::id())->update(['package' => $package]);

                return back()->with('status-success', 'Formularz został aktywowany na okres jednego miesiąca');
            }
        }
    }


//    ================================== widoczność formularza ===================

   public function form_status(Request $request, $id, $form_id){



        $form = Form::where([
            ['user_id', Auth::id()],
            ['id', $form_id]
        ])->first();

        if($request->status == 0 )
        {
            $form->active = 0;
            $form->save();

            return back()->with('status-success', 'Status formularza został zmieniony na - niewidoczny'); // zmiana statusu formulrza na - nieaktywny
        }
        elseif($request->status == 1)
        {
            if($form->active_date != null && $form->active_date > Carbon::yesterday())
            {
                $form->active = 1;
                $form->save();

                return back()->with('status-success', 'Status formularza został zmieniony na - widoczny'); // zmiana statusu formulrza na - aktywny
            }
            else{
                return back()->with('status-error', 'Niestety ale upłyną termin ważności tego formularza - aktywój go ponownie abyś mógł z niego korzystać'); // zmiana statusu formulrza na - aktywny
            }
        }

        return back()->with('status-error', 'Coś poszło nie tak, spróbuj raz jeszcze'); // błąd
    }


//    ================================ usuwanie formularza ==============================

    public function form_delete($id, $form_id){
        Form::findOrFail($form_id)->delete();
        return back()->with('status-success', 'Formularz został usunięty');
    }
}

