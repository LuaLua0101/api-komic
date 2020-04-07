<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($page = 1, $query = null)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        if ($query == null || $query == '') {
            $sum = Account::getSum();
            $page = $page > $sum ? $sum : $page;
            $data = Account::getList($page);
        } else {
            $sum = Account::getSum($query);
            $page = $page > $sum ? $sum : $page;
            $data = Account::getListQuery($query, $page);
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

        return view('admin.users.list')->with('data', $data);
    }

    public function getAddUser(Request $request)
    {
        return view('admin.users.add');
    }

    public function postAddUser(Request $request)
    {
        // name
        $name = $request->name;
        if (!$name) {
            $name = "User " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/users/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'name' => $name,
            'avatar' => $cover,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = Account::addNew($data);
        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListUser');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetListUser');
        }
    }

    public function getEditUser($id)
    {
        $data = Account::getById($id);
        if ($data) {
            return view('admin.users.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListUser');
        }
    }

    public function postEditUser($id, Request $request)
    {
        // name
        $name = $request->name;
        if (!$name) {
            $name = "User " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/users/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $data['avatar'] = $cover;
        }

        $result = Account::updateRecord($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListUser');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelUser($id)
    {
        $result = Account::deleteRecord($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListUser')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListUser')->with('error', 'Xóa thất bại!');
        }
    }

    public function getPro5User() {
        return view('admin.profile');
    }
}