<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getPersonalInfo(Request $request)
    {
        return 'OK';
    }

    public function getMyCV(Request $request)
    {
        return 'OK';
    }
}