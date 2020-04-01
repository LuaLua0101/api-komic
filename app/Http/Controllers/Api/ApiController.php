<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SMS\SpeedSMSAPI;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function testApi(Request $request)
    {
        return 'OK';
    }

    public function sendOTP()
    {
        $smsAPI = new SpeedSMSAPI;
        $userInfo = $smsAPI->getUserInfo();
        $phones = ["84859571638"];
        $content = "test sms";
        $type = 1;

        // $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
        return $response;
    }
}