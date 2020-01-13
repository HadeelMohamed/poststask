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

Route::get('/', function () {
    return view('home');
});


//blog routes
Route::resource('blogs','BlogController');
///contact us routes
Route::get("/contactus","ContactUsController@index");
Route::post('/sendcontactusmail', "ContactUsController@sendcontactusmail")->name('sendcontactusmail');

Route::post('/searchresults', 'SearchController@searchresults')->name('searchresults');


////////login rout only  with limit hits
Route::post("/login","Auth\LoginController@login")->middleware("throttle:10,5");


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
///validation rute for email in register
Route::post('/checkemail', 'AjaxController@checkemail')->name('checkemail');

///front routes
Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts','PostController');
    Route::resource('comments','CommentController');
});

////dashboard routes
Route::prefix('dashboard')->namespace('Dashboard')->group(function () {
    Route::any('login', 'LoginController@index')->name('dashboardlogin');
    Route::post('login', 'LoginController@authenticate')->name('dashboardlogin');
    Route::any('dashboardlogout', 'LoginController@logout')->name('dashboardlogout');

});



Route::group(['namespace' => 'Dashboard','prefix' => 'dashboard','middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
