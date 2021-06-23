<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\services\Notification\Constants\EmailTypes;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function email()
    {
        $users = User::all();
        $emailTypes = EmailTypes::toString();
        return view('notification.send-email',compact('users','emailTypes'));
    }
}
