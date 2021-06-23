<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\services\Notification\Constants\EmailTypes;
use App\services\Notification\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function email()
    {
        $users = User::all();
        $emailTypes = EmailTypes::toString();
        return view('notification.send-email',compact('users','emailTypes'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'user' => 'integer|exists:users,id',
            'email_type' => 'integer'

        ]);
        try {

            $mailable = EmailTypes::toMail($request['email_type']);

            $notification = resolve(Notification::class);
            $notification->sendEmail(User::find($request->user),new $mailable);
            return redirect()->back()->with('success',__('notification.email-send-successfully'));
        }catch (\Throwable $error){
            return redirect()->back()->with('failed',__('notification.email-has-problem'));
        }

    }
}
