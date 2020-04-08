<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        $query = $request->query('query');
        if ($query == null || $query == '') {
            $sum = Author::getSum();
            $page = $page > $sum ? $sum : $page;
            $data = Author::getList($page);
        } else {
            $sum = Author::getSum($query);
            $page = $page > $sum ? $sum : $page;
            $data = Author::getListQuery($query, $page);
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
            'link' => route('adgetAddAuthor'),
            'search_link' => route('adgetListAuthor'),
        ];
        return view('admin.authors.list')->with(['data' => $data, 'action' => $action]);
    }

    public function getAddAuthor(Request $request)
    {
        $action = [
            'title' => 'Danh sách giảng viên',
            'link' => route('adgetListAuthor'),
            'search_link' => route('adgetListAuthor'),
        ];
        return view('admin.authors.edit')->with(['action' => $action]);
    }

    public function postAddAuthor(Request $request)
    {
        // name
        $name = $request->name;
        if (!$name) {
            $name = "Author " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/authors/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'name' => $name,
            'gender' => intval($request->gender),
            'phone'=>$request->phone,
            'email'=>$request->email,
            'avatar' => $cover,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = Author::addNew($data);
        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListAuthor');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetListAuthor');
        }
    }

    public function getEditAuthor($id)
    {
        $data = Author::getById($id);
        if ($data) {
            return view('admin.authors.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListAuthor');
        }
    }

    public function postEditAuthor($id, Request $request)
    {
        // name
        $name = $request->name;
        if (!$name) {
            $name = "Author " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/authors/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'name' => $name,
            'gender' => intval($request->gender),
            'phone'=>$request->phone,
            'email'=>$request->email,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $data['avatar'] = $cover;
        }

        $result = Author::updateRecord($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListAuthor');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelAuthor($id)
    {
        $result = Author::deleteRecord($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListAuthor')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListAuthor')->with('error', 'Xóa thất bại!');
        }
    }

}