<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function index()
    {
        $data = Province::getList();

        return view('admin.provinces.list')->with('data', $data);
    }

    public function getDetailProvince($id)
    {
        $data = Province::getById($id);
        if ($data) {
            $data['district'] = District::getListById($id);
            return view('admin.provinces.detail')->with('data', $data);
        } else {
            return redirect()->route('adgetListProvince');
        }
    }
}