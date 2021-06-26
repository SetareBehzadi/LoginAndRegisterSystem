<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;
use App\services\Notification\Constants\EmailTypes;
use App\services\Notification\Exceptions\UserDoesnotHaveNumber;
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
          //  $notification->sendEmail(User::find($request->user),new $mailable);
            SendEmail::dispatch(User::find($request->user),new $mailable);
            return redirect()->back()->with('success',__('notification.email-send-successfully'));
        }catch (\Throwable $error){
            return redirect()->back()->with('failed',__('notification.email-has-problem'));
        }

    }

    public function sms()
    {
        $users = User::all();
      //  $emailTypes = EmailTypes::toString();
        return view('notification.send-sms',compact('users'));
    }

    public function sendSms(Request $request, Notification $notification)
    {
        $request->validate([
            'user' => 'integer|exists:users,id',
            'text' => 'string|max:256'

        ]);
        try {

            //$notification = resolve(Notification::class);
            $notification->sendSms(User::find($request->user),$request->text);
            return $this->redirectBack('success',__('notification.sms-send-successfully'));
        }catch (UserDoesnotHaveNumber $error){
            return $this->redirectBack('failed',__('notification.user_does_not_have_number'));
        }catch (\Exception $error){
            return $this->redirectBack('failed',__('notification.sms-has-problem'));
        }

    }

    private function redirectBack($type,$text){
       return redirect()->back()->with($type,$text);
    }

}
