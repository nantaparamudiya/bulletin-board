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
Auth::routes([
  'verify' => true,
  'reset'  => false
]);

Route::redirect('/', '/bulletin')->name('home');

Route::resource('gallery', 'GalleryController');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@sendMail')->name('send');

Route::resource('bulletin', 'BulletinController')->except(['create', 'show']);
Route::get('/bulletin/{bulletin}/delete', 'BulletinController@delete')->name('bulletin.delete');

Route::prefix('register')->group(function (){

  Route::post('validation', 'Auth\RegisterController@validator')->name('register.validation');
  Route::post('create', 'Auth\RegisterController@create')->name('register.create');

  Route::get('confirmation', function (){
    return view('auth.register-confirmation');
  })->name('register.confirmation');

  Route::get('success', function (){
    return view('auth.verify');
  })->name('email.verification');

});

Route::get('success', function (){
  return view('auth.verification-success');
})->name('registered');


Route::name('admin.')->group(function (){
	
	Route::get('/admin/login', 'AdminController@showLoginForm')->name('login.form');
	Route::post('/admin/login', 'AdminController@login')->name('login');
	
  Route::get('/admin', 'AdminController@dashboard')->name('dashboard');
  Route::get('/admin/contact', 'AdminController@contact')->name('contact');
	
});

Route::get('locale/{locale}', function ($locale){
  Session::put('locale', $locale);

  if (request()->fullUrl() === redirect()->back()->getTargetUrl()) {
    return redirect('/');
  }

  return redirect()->back();
});