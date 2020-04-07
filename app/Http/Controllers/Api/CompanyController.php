<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getNearestCompany(Request $request)
    {
        $data = Company::viecGanBan();
        return response()->json(['title' => 'công ty gần bạn', 'data' => $data], 200);
    }

    public function getCompany4u(Request $request)
    {
        $data = Company::viecHot();
        return response()->json(['title' => 'công ty cần bạn', 'data' => $data], 200);
    }

    public function getSavedCompany(Request $request)
    {
        $data = Company::congTyDaLuu();
        return response()->json(['data' => $data], 200);
    }
}
