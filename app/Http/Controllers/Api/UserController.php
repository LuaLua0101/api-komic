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

    public function getUserList()
    {
        return Account::get();
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

    public function getActiveUser()
    {
        $t = Account::active();
        if ($t) {
            return response()->json([$t], 200);
        } else {
            return response()->json(['error'], 500);
        }
    }

    public function updatePersonalInfo(Request $request)
    {
        // name
        $name = $request->name;
        if (!$name) {
            $name = "User " . time();
        }

        // coverFile
        // $coverFile = $request->cover;
        // $cover = "";
        // if ($request->hasFile('cover')) {
        //     $cover = time() . '.' . $request->cover->extension();
        //     $request->cover->storeAs('img/users/', $cover);
        //     $cover .= '?n=' . time();
        // }

        $data = [
            'name' => $name,
            'gender' => intval($request->gender),
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            // 'dob' => $request->dob,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // if ($cover != "") {
        //     $data['avatar'] = $cover;
        // }

        $result = Account::updateRecord(auth()->user()->id, $data);

        if ($result) {
            return response()->json([$result], 200);
        } else {
            return response()->json(['error'], 500);
        }
    }

    public function postActiveUser(Request $request)
    {
        // $t = Account::updateFCM($request->fcm_token);
        // if ($t) {
        //     return response()->json([], 200);
        // } else {
        //     return response()->json(['error'], 500);
        // }
    }

}