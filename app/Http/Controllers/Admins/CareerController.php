<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        $query = $request->query('query');
        if ($query == null || $query == '') {
            $sum = Career::getSum();
            $page = $page > $sum ? $sum : $page;
            $data = Career::getList($page);
        } else {
            $sum = Career::getSum($query);
            $page = $page > $sum ? $sum : $page;
            $data = Career::getListQuery($query, $page);
            $data->query = $query;
        }

        $data->sum = $sum;
        if ($page == $sum) {
            $data->page = $sum;
            $data->next = $sum;
            $data->prev = $page - 1;
        } else {
            $data->page = $page;
            $data->next = $page + 1;
            $data->prev = $page - 1;
        }

        $action = [
            'title' => 'Thêm mới giảng viên',
            'link' => route('adgetAddCareer'),
            'search_link' => route('adgetListCareer'),
        ];
        return view('admin.careers.list')->with(['data' => $data, 'action' => $action]);
    }

    public function getAddCareer(Request $request)
    {
        $action = [
            'title' => 'Danh sách giảng viên',
            'link' => route('adgetListCareer'),
            'search_link' => route('adgetListCareer'),
        ];
        return view('admin.careers.edit')->with(['action' => $action]);
    }

    public function postAddCareer(Request $request)
    {
        // name
        $name = $request->name;
        if (!$name) {
            $name = "Career " . time();
        }

        $data = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = Career::addNew($data);
        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListCareer');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetListCareer');
        }
    }

    public function getEditCareer($id)
    {
        $data = Career::getById($id);
        if ($data) {
            return view('admin.careers.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListCareer');
        }
    }

    public function postEditCareer($id, Request $request)
    {
        // name
        $name = $request->name;
        if (!$name) {
            $name = "Career " . time();
        }

        $data = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = Career::updateRecord($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListCareer');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelCareer($id)
    {
        $result = Career::deleteRecord($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListCareer')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListCareer')->with('error', 'Xóa thất bại!');
        }
    }

}