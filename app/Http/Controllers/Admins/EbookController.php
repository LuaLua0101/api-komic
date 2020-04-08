<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\TestEbook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        $query = $request->query('query');
        if ($query == null || $query == '') {
            $sum = TestEbook::getSumEbook();
            $page = $page > $sum ? $sum : $page;
            $data = TestEbook::getListEbook($page);
        } else {
            $sum = TestEbook::getSumEbook($query);
            $page = $page > $sum ? $sum : $page;
            $data = TestEbook::getListQueryEbook($query, $page);
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
            'title' => 'Thêm mới ebook',
            'link' => route('adgetAddEbook'),
            'search_link' => route('adgetListEbook'),
        ];
        return view('admin.ebooks.list')->with(['data' => $data, 'action' => $action]);
    }

    public function getAddEbook(Request $request)
    {
        $action = [
            'title' => 'Danh sách ebook',
            'link' => route('adgetListEbook'),
            'search_link' => route('adgetListEbook'),
        ];
        return view('admin.ebooks.edit')->with(['action' => $action]);
    }

    public function postAddEbook(Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Ebook " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/ebooks/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'title' => $title,
            'cover' => $cover,
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = TestEbook::addNewEbook($data);
        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListEbook');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetListEbook');
        }
    }

    public function getEditEbook($id)
    {
        $data = TestEbook::getByIdEbook($id);
        if ($data) {
            return view('admin.ebooks.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListEbook');
        }
    }

    public function postEditEbook($id, Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Ebook " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/ebooks/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'title' => $title,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $data['cover'] = $cover;
        }

        $result = TestEbook::updateRecordEbook($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListEbook');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelEbook($id)
    {
        $result = TestEbook::deleteRecordEbook($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListEbook')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListEbook')->with('error', 'Xóa thất bại!');
        }
    }

}
