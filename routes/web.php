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


Route::redirect('/', '/login', 301);

Route::get('/login', 'UserLoginController@showLoginForm');

Route::post('/login', 'UserLoginController@login')->name('login');

Route::get('/logout', 'UserLoginController@logout');

Route::get('/dashboard', 'UserController@showDashboard');

Route::get('/setting', 'UserController@showSetting');

Route::post('/setting/password', 'UserController@updatePassword');

Route::post('/setting/telegram', 'UserController@updateTelegramChatId');


Route::get('/tickets', 'TicketController@getAllTickets');

Route::get('/tickets/new', 'TicketController@newTicket');

Route::post('/tickets/new', 'TicketController@sendNewTicket');

Route::get('/tickets/done/{ticket}', 'TicketController@ticketDone');

Route::get('/tickets/attachment{filename}', 'TicketController@downloadAttachmentFile');

Route::get('/tickets/{ticket}', 'TicketController@replyTicket');

Route::post('/tickets/{ticket}', 'TicketController@sendReplyTicket');


Route::get('/invoices', 'InvoiceController@getAllInvoices');


Route::redirect('/admin', '/admin/login', 301);

Route::get('/admin/login', 'AdminLoginController@showLoginForm');

Route::post('/admin/login', 'AdminLoginController@login');

Route::get('/admin/logout', 'AdminLoginController@logout');

Route::get('/admin/dashboard', 'AdminController@showDashboard');

Route::get('/admin/profile', 'AdminController@showProfile');

Route::post('/admin/profile', 'AdminController@updateProfile');

Route::get('/admin/users/new', 'AdminUserController@showAddUserForm');

Route::post('/admin/users/new', 'AdminUserController@createNewUser');

Route::get('/admin/users', 'AdminUserController@showUsers');

Route::get('/admin/users/edit/{id}', 'AdminUserController@showEditUser');

Route::post('/admin/users/edit/{id}', 'AdminUserController@editUser');

Route::get('/admin/tickets/new', 'AdminTicketController@showNewTicket');

Route::post('/admin/tickets/new', 'AdminTicketController@newTicket');

Route::get('/admin/tickets', 'AdminTicketController@showAllTickets');

Route::get('/admin/tickets/{ticket}', 'AdminTicketController@showReplyTicket');

Route::post('/admin/tickets/{ticket}', 'AdminTicketController@sendReplyTicket');

Route::get('/admin/tickets/delete/{ticket}', 'AdminTicketController@deleteTicket');

Route::get('/admin/attachment{filename}', 'AdminTicketController@downloadAttachmentFile');

Route::post('/admin/update/{ticket}', 'AdminTicketController@ticketUpdateStatusPriority');

Route::get('/admin/projects', 'AdminProjectController@showAllProjects');

Route::get('/admin/projects/new', 'AdminProjectController@showNewProject');

Route::post('/admin/projects/new', 'AdminProjectController@newProject');

Route::get('/admin/projects/edit/{id}', 'AdminProjectController@showEditProject');

Route::post('/admin/projects/edit/{id}', 'AdminProjectController@editProject');

Route::get('/admin/invoices/delete/{id}', 'AdminInvoiceController@deleteInvoice');

Route::get('/admin/invoices', 'AdminInvoiceController@showAllInvoices');

Route::get('/admin/invoices/new', 'AdminInvoiceController@showNewInvoice');

Route::post('/admin/invoices/new', 'AdminInvoiceController@newInvoice');

Route::get('/admin/invoices/paid/{id}', 'AdminInvoiceController@paidInvoice');

Route::get('/admin/get/tickets/{user}', 'AdminInvoiceController@getAjaxTicket'); //Ajax GET

Route::get('/admin/contents/delete/{content}', 'AdminTicketController@deleteContent');
