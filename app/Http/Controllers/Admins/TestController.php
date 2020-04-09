<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\TestEbook;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        $query = $request->query('query');
        if ($query == null || $query == '') {
            $sum = TestEbook::getSumTest();
            $page = $page > $sum ? $sum : $page;
            $data = TestEbook::getListTest($page);
        } else {
            $sum = TestEbook::getSumTest($query);
            $page = $page > $sum ? $sum : $page;
            $data = TestEbook::getListQueryTest($query, $page);
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
            'title' => 'Thêm mới bài test',
            'link' => route('adgetAddTest'),
            'search_link' => route('adgetListTest'),
        ];
        return view('admin.tests.list')->with(['data' => $data, 'action' => $action]);
    }

    public function getAddTest(Request $request)
    {
        $action = [
            'title' => 'Danh sách bài test',
            'link' => route('adgetListTest'),
            'search_link' => route('adgetListTest'),
        ];
        return view('admin.tests.edit')->with(['action' => $action]);
    }

    public function postAddTest(Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Test " . time();
        }

        // buy count
        $buy = $request->buy;
        if (!$buy) {
            $buy =0;
        }

        // review count
        $review = $request->review;
        if (!$review) {
            $review =0;
        }
        
        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/tests/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'title' => $title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'author_id' => $request->author,
            'block_id' => $request->block,
            'url' => $request->url,
            'cover' => $cover,
            'buy_count' => $buy,
            'review_count' => $review,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = TestEbook::addNewTest($data);
        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListTest');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetListTest');
        }
    }

    public function getEditTest($id)
    {
        $data = TestEbook::getById($id);
        if ($data) {
            return view('admin.tests.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListTest');
        }
    }

    public function postEditTest($id, Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Test " . time();
        }

        // buy count
        $buy = $request->buy;
        if (!$buy) {
            $buy =0;
        }

        // review count
        $review = $request->review;
        if (!$review) {
            $review =0;
        }
        
        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/tests/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'title' => $title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'author_id' => $request->author,
            'block_id' => $request->block,
            'url' => $request->url,
            'buy_count' => $buy,
            'review_count' => $review,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $data['cover'] = $cover;
        }

        $result = TestEbook::updateRecordTest($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListTest');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelTest($id)
    {
        $result = TestEbook::deleteRecordTest($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListTest')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListTest')->with('error', 'Xóa thất bại!');
        }
    }

}