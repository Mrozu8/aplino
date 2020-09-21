<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('privacy');
Route::get('/cookie_policy', 'HomeController@cookie_policy')->name('cookie');
Route::get('/rule', 'HomeController@rule')->name('rule');

Route::post('/newsletter', 'MailController@newsletter')->name('newsletter');
Route::post('/send-question', 'MailController@send_question')->name('send_question');


Route::get('email_confirmation/{email}', 'MailConfirmController@confirm_email')->name('confirm_email'); // potwierdzenie konta
Route::get('confirm-again', 'MailConfirmController@confirm_again')->name('confirm_again'); // strona wysłania ponownie emaila aktywującego
Route::post('confirm-again/send', 'MailConfirmController@send_again')->name('send_again'); // wysyłanie ponownie emaila aktywującego

//==================================================== Widok klienta

Route::get('company/{id}', 'CompanyController@show')->name('company-show');
Route::get('company/{id}/information', 'CompanyController@information')->name('information'); // information page
Route::get('company/{id}/form', 'CompanyController@form')->name('company-form');
Route::get('company/{id}/archives', 'CompanyController@archives')->name('company-archives');
Route::get('company/{id}/archives/{form_id}', 'CompanyController@single_form_archives')->name('company-single-archives'); // pojedynczy formularz w archiwóm (nie CV)
Route::get('company/{id}/archives/{form_id}/cv/{cv_id}', 'CompanyController@single_cv_archives')->name('company-single-archives-cv'); // pojedyncze cv
Route::get('company/{id}/inbox', 'CompanyController@inbox')->name('company-inbox'); // Supptor
Route::get('company/{id}/inbox/{inbox_id}', 'CompanyController@single_inbox')->name('company-single-inbox'); // Supptor
Route::get('company/{id}/settings', 'CompanyController@settings')->name('company-settings'); // Ustawienia konta
Route::patch('company/{id}/settings/change-data', 'CompanyController@update_data')->name('company-update-data'); // update ustawieni konta
Route::patch('company/{id}/settings/active-businessCard', 'CompanyController@active_businessCard')->name('company-active-businessCard'); // update aktywności wizytówki
Route::patch('company/{id}/settings/update-require-info', 'CompanyController@update_require_info')->name('company-require-info'); // update wymaganych pól wizytówki

Route::get('company/{id}/payment', 'CompanyController@payment')->name('company-payment'); // Widok płatności



Route::post('company/{id}/settings/change-password-email/', 'CompanyController@update_password_email')->name('company-update-password-email'); // update hasła
Route::get('company/{id}/settings/change-password/{hash}', 'CompanyController@update_password')->name('company-update-password'); // update hasła







//===================================== formularze

Route::post('company/{id}/form', 'FormController@form_create')->name('form-create'); //dodawanie formularza
Route::get('company/{id}/form/{form_id}', 'FormController@form_show')->name('form-show'); //wyświetlanie edycji formularza
Route::post('company/{id}/form/{form_id}/input', 'FormController@create_input')->name('create-input'); // dodawanie custom fields

Route::delete('company/{id}/form/{form_id}/custom_delete', 'FormController@custom_input_delete')->name('custom-delete');

Route::patch('company/{id}/form/{form_id}/basic-input', 'FormController@basic_input')->name('basic-input'); // Update podstawowych inputów
Route::patch('company/{id}/form/{form_id}/save', 'FormController@update_form')->name('update-form'); // Update formularza

Route::get('cv/{company_name}/{form_id}', 'FormController@show_cv')->name('show-cv'); // Show CV gotowego do wypełnienia
Route::patch('curriculum-vitae/{form_id}/save', 'FormController@create_cv')->name('create-cv'); // Zapisanie aplikowanego cv

Route::get('cv/{company_name}/{form_id}/pre', 'FormController@show_pre_cv')->name('show-pre-cv'); // Podgląd gotowego cv


Route::patch('company/{id}/archives/{form_id}/cv/{cv_id}/update', 'FormController@cv_rating')->name('cv-rating'); // Zapis oceny CV

Route::post('company/{id}/form/{form_id}/status', 'FormController@form_status')->name('form-status'); //status formularza
Route::delete('company/{id}/form/{form_id}/delete', 'FormController@form_delete')->name('form-delete'); //usuwanie formularza

Route::get('company/{id}/form/{form_id}/active-form', 'FormController@active_form')->name('active-form'); //Aktywacja formularza !!!!


Route::get('company/{id}/form/{form_id}/edit-end', 'FormController@edit_end')->name('edit-end'); //Zatwierdzanie formularza (wyłączenie edycji) formularza !!!!



Route::get('company/{id}/archives/{form_id}/cv/{cv_id}/next', 'CompanyController@single_cv_archives_next')->name('company-single-archives-cv_next'); // pokazanie kolejnego formularza w archiwum
Route::get('company/{id}/archives/{form_id}/cv/{cv_id}/previous', 'CompanyController@single_cv_archives_previous')->name('company-single-archives-cv_previous'); // pokazanie poprzedniego formularza w archiwum



//========================================= panel admina

Route::get('admin/', 'AdminController@home')->name('admin-home'); // strona home panelu admina
Route::get('admin/users', 'AdminController@users')->name('admin-users'); // lista użytkowników
Route::get('admin/users/{id}', 'AdminController@single_user')->name('admin-single-user'); // Profil użytkownika
Route::get('admin/archives', 'AdminController@archives')->name('admin-archives'); // Archiwum formularzy
Route::get('admin/inbox', 'AdminController@inbox')->name('admin-inbox'); // Archiwum formularzy
Route::get('admin/inbox/{id}', 'AdminController@single_inbox')->name('admin-single-inbox'); // Archiwum formularzy
Route::get('admin/settings', 'AdminController@settings')->name('admin-settings'); // Ustawienia panelu admina
Route::patch('admin/settings/change-password', 'AdminController@update_password')->name('admin-update-password'); // Ustawienia panelu admina




//=================================== inbox

Route::post('company/{id}/inbox/send-question', 'InboxController@question_company')->name('question-company'); // formularz zgłoszeń dla firm
Route::post('company/{id}/inbox/inbox/{inbox_id}/send', 'InboxController@question_thread_company')->name('question-thread-company'); // formularz odpowiedzi dla fiem

Route::post('admin/user/{id}/send', 'InboxController@question_admin')->name('question-admin'); // wiadomość do pojedynczych kont
Route::post('admin/inbox/send-all', 'InboxController@send_all')->name('send-all-admin'); // wiadomość do wszystkich
Route::post('admin/inbox/{id}/send', 'InboxController@question_thread_admin')->name('question-thread-admin'); // formularz odpowiedzi supportu



// =============================== płatności

//Route::get('company/{id}/payment/{id_type}/select-bank', 'tpay\SelectBankController@SelectBank')->name('select-bank'); // pierwszy krok
Route::post('company/{id}/payment/select-bank', 'tpay\BankSelection@getBankForm')->name('select-bank')->middleware('permission'); //first step

//Route::any('company/{id}/payment/{id_transaction}/success', 'tpay\RequestController@checkPayment')->name('result-request'); // odbiór requesta z tpay

Route::any('/payment/success/req', 'tpay\TransactionNotification@checkPayment')->name('result-request');


Route::any('company/{id}/payment/success', 'tpay\SuccessController@success')->name('success-request'); // sukces transakcji


//============================ faktury


Route::get('/company/{id}/payment/{invoice_id}/invoice-download','CompanyController@invoice_download')->name('inv-download');
Route::post('/company/{id}/payment/{form_id}/poster-download','CompanyController@poster_download')->name('poster-download');

//Route::post('/company/{form_id}/qr','CompanyController@pqr')->name('qr');


Route::get('/admin/cron-form-end','CroneStatusController@crone_form')->name('crone-form'); // ręczne puszczenie crona - wygaśnięcie formularzy
//Route::get('/admin/cron-email-end','CroneStatusController@crone_email')->name('crone-email'); // ręczne puszczenie crona - wygaśnięcie formularzy

Route::post('/company/{id}/fpdf/{form_id}','Pdf\PosterController@poster_download')->name('pdf-qr');

Route::get('company/{id}/archives/{form_id}/download-xml/{cv_id}', 'CompanyController@single_cv_xml')->name('single-cv-xml'); // Pobieranie pojedynczego cv - xml
Route::get('company/{id}/archives/{form_id}/download-all-xml', 'CompanyController@group_cv_xml')->name('group-cv-xml'); // Pobieranie wszystkich cv z grupy - xml


