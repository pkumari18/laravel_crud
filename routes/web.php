<?php
/*<!--Inventory Management-->*/
Route::redirect('/', 'dashboard');
Route::resource('item', 'ItemsController');
Route::resource('category', 'CategoryController');
Route::resource('location', 'LocationController');
Route::resource('dashboard', 'DashboardController');
/*Route::get('/fetch/{id}', 'DashboardController@fetch');*/
Route::delete('delete-multiple-item', ['as'=>'item.multiple-delete','uses'=>'ItemsController@deleteMultiple']);
/*Route::get('items/create','ItemsController@create')->name('item.create');*/

/*<!---couriers  Management-->
*/
Route::resource('couriers', 'CourierController');
Route::get('list-couriers/{type}', 'CourierController@listCouriers')->name('couriers.list-couriers');
Route::post('forward-couriers/{id} ','CourierController@forwardCouriers')->name('couriers.forward-couriers');

/*<!---ticket--->*/
Route::resource('tickets', 'TicketController');
/*Route::get('post', 'PostController@index')->name('post.index');*/
/*Route::resource('news', 'NewsController');/**/
Route::resource('helpdesk', 'TicketController');
Route::get('user_tickets/{id}','TicketController@userTickets')->name('helpdesk.user_tickets');

/*
Route::post('create-tickets ','TicketController@createTickets')->name('helpdesk.create-tickets');
*/
/*Route::post('dashboard-create','TicketController@dashboardCreate')->name('helpdesk.dashboard-create');*/
Route::get('/fetch_subs/{id}', 'TicketController@fetchSubs');
/*Route::resource('login','LoginController');*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
