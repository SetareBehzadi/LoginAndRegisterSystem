<?php

use App\Mail\TopicCreated;
use App\Models\User;
use App\services\Notification\Notification;
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
Route::get('/', function () {
    return view('about');
});
Route::get('/notifications/send-email','NotificationsController@email')->name('notification.form.email');
