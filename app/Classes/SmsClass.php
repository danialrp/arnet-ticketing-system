<?php

namespace App\Classes;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SmsClass
 *
 * @package \App\Classes
 */
class SmsClass implements ShouldQueue
{
    //Farapayamak API For Sending SMS

    protected $username = 'charnama';

    protected $password = 'F6000@trD%';

    protected $from = '10000040004004';

    public function __construct()
    {

    }

    public function sendSms($to, $text)
    {
        $client = new Client();

        try {

            $result = $client->request('POST', 'https://rest.payamak-panel.com/api/SendSMS/SendSMS',[
                'form_params' => [
                    'username' => $this->username,
                    'password' => $this->password,
                    'to' => $to,
                    'from' => $this->from,
                    'text' => $text,
                    'flash' => 'false'
                ],

                'headers' => [
                    'content-type' => 'application/x-www-form-urlencoded',
                    'postman-token' => '3e39c158-2d35-75bb-1ae7-f76d9012wee8f',
                    'cache-control' => 'no-cache'
                ]
            ]);

            $response = json_decode($result->getBody());

            if($response->Value == '11') {
                $result = '!خطا در ارسال پیامک به کاربر';
                return $result;
            }

            $result = 'هشدار پیامک ارسال شد';

            return $result;
        }

        catch (GuzzleException $exception) {
            return $exception;
        }
    }

}