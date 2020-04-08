<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');
        if ($query == null || $query == '') {
            $data = Province::getList();
        } else {
            $data = Province::getListQuery($query);
        }

        $action = [
            'search_link' => route('adgetListProvince'),
        ];
        return view('admin.provinces.list')->with(['data' => $data, 'action' => $action]);
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