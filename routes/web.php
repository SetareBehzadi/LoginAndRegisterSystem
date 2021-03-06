<?php

use App\Mail\TopicCreated;
use App\Models\User;
use App\services\Notification\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $notification = resolve(Notification::class);
    $notification->sendEmail(User::find(1),new TopicCreated);
    $notification->sendSms(User::find(1),'payame testi');
});*/
Route::get('/',function (){
    return view('welcome');
})->name('home');

Route::group(['prefix'=>'auth','namespace'=>'Auth'],function (){
    Route::get('register','RegisterController@showRegistrationForm')->name('auth.register.form');
    Route::post('register','RegisterController@register')->name('auth.register');
    Route::get('login','LoginController@showLoginForm')->name('auth.login.form');
    Route::post('login','LoginController@login')->name('auth.login');
    Route::get('logout','LoginController@logout')->name('auth.logout');

});
Route::get('logout',function (){
    Auth::logout();
});
