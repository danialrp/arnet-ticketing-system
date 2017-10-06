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


/*Route::get('/', function () {
    return view('welcome');
});*/

//Auth::routes();

//Route::get('/', 'Auth\LoginController@getLogin');

//Route::get('/login', 'Auth\LoginController@getLogin');

Route::redirect('/', '/login', 301);

Route::redirect('/home', '/login', 301);

Route::get('/login', 'UserLoginController@showLoginForm');

Route::post('/login', 'UserLoginController@login')->name('login');

Route::get('/logout', 'UserLoginController@logout');

Route::get('/dashboard', 'UserController@showDashboard');


Route::get('/admin/login', 'AdminLoginController@showLoginForm');

Route::post('/admin/login', 'AdminLoginController@login');

Route::get('/admin/logout', 'AdminLoginController@logout');

Route::get('/admin/dashboard', 'AdminController@showDashboard');


Route::get('/tickets', 'TicketController@getAllTickets');

Route::get('/tickets/new', 'TicketController@newTicket');

Route::post('/tickets/new', 'TicketController@sendNewTicket');

Route::get('/tickets/done/{ticket}', 'TicketController@ticketDone');

Route::get('/tickets/attachment/{filename}', 'TicketController@downloadAttachmentFile');

Route::post('/tickets/{ticket}', 'TicketController@sendReplyTicket');

Route::get('/tickets/{ticket}', 'TicketController@replyTicket');


Route::get('/invoices', 'InvoiceController@getAllInvoices');