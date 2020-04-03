<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getPersonalInfo(Request $request)
    {
        return Account::find(auth()->user()->id);
    }

    public function getMyCV(Request $request)
    {
        return 'OK';
    }

    public function updateFCM(Request $request)
    {
        $t = Account::updateFCM($request->fcm_token);
        if ($t) {
            return response()->json([], 200);
        } else {
            return response()->json(['error'], 500);
        }
    }
}