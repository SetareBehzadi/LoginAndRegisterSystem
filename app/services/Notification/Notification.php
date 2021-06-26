<?php


namespace App\services\Notification;


use App\Models\User;
use App\services\Notification\Providers\Contracts\Provider;
use GuzzleHttp\Client;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class Notification
{
    public function __call($method,$arguments)
    {
        $providerPath = __NAMESPACE__.'\Providers\\'.substr($method,4).'Provider';// hazve send az ebtedaye tabe baraye dastyabi be class
        if (!class_exists($providerPath)){
            throw new \Exception("class does not exist");
        }
        $providerInstance = new $providerPath(...$arguments);
         if(!is_subclass_of($providerInstance,Provider::class)){
             throw new \Exception("class must implements App\services\Notification\Providers\Contracts");
         }
        return $providerInstance->send();
    }
}
