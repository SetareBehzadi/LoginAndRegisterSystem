<?php


namespace App\services\Notification\Providers;


use App\Models\User;
use App\services\Notification\Providers\Contracts\Provider;
use GuzzleHttp\Client;

class SmsProvider implements Provider
{
    private $user ;
    private $text;
    public function __construct(User $user,String $text)
    {
        $this->user = $user;
        $this->text = $text;
    }
    public function send()
    {
        $clinet = new Client();


        $response = $clinet->post(config('services.sms.uri'),$this->preparedDataForSms());
        echo  $response->getBody();
    }

    public function preparedDataForSms()
    {
        $base = [
            'op' => 'send',
            'message' =>  $this->text,
            'to' => [$this->user->phone_number]
        ];
        $data = array_merge(config('services.sms.auth'),$base);
        $option = [
            "json" => $data
        ];

        return $option;
    }
}
