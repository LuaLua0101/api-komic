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
        return response()->json(['title' => 'Doanh nghiệp gần bạn', 'data' => $data], 200);
    }

    public function getCompany4u(Request $request)
    {
        $data = Company::viecHot();
        return response()->json(['title' => '', 'data' => $data], 200);
    }

    public function getCompanyNeedU(Request $request)
    {
        $data = Company::DNCanBan();
        return response()->json(['title' => 'Doanh nghiệp cần bạn', 'data' => $data], 200);
    }

    public function getSavedCompany(Request $request)
    {
        $data = Company::congTyDaLuu();
        return response()->json(['title' => 'Doanh nghiệp đã lưu', 'data' => $data], 200);
    }
}