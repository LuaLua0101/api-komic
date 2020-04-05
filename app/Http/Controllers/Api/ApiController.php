<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SMS\SpeedSMSAPI;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function testApi(Request $request)
    {
        return 'OK';
    }

    public function sendOTP()
    {
        $smsAPI = new SpeedSMSAPI;
        $userInfo = $smsAPI->getUserInfo();
        $phones = ["84708222030"];
        $content = "Xac nhan SMS cho con Thu Ngu: " . rand(1000,9999);
        $type = 1;
        $sender = "brandname";
        
        $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
        return $response;
    }
}