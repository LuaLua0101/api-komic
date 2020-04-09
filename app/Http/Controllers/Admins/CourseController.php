<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        $query = $request->query('query');
        if ($query == null || $query == '') {
            $sum = Course::getSum();
            $page = $page > $sum ? $sum : $page;
            $data = Course::getList($page);
        } else {
            $sum = Course::getSum($query);
            $page = $page > $sum ? $sum : $page;
            $data = Course::getListQuery($query, $page);
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
            'title' => 'Thêm mới khóa học',
            'link' => route('adgetAddCourse'),
            'search_link' => route('adgetListCourse'),
        ];
        return view('admin.courses.list')->with(['data' => $data, 'action' => $action]);
    }

    public function getAddCourse(Request $request)
    {
        $action = [
            'title' => 'Danh sách khóa học',
            'link' => route('adgetListCourse'),
            'search_link' => route('adgetListCourse'),
        ];
        return view('admin.courses.edit')->with(['action' => $action]);
    }

    public function postAddCourse(Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Course " . time();
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
            $request->cover->storeAs('img/courses/', $cover);
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

        $result = Course::addNew($data);
        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListCourse');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetListCourse');
        }
    }

    public function getEditCourse($id)
    {
        $data = Course::getById($id);
        if ($data) {
            return view('admin.courses.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListCourse');
        }
    }

    public function postEditCourse($id, Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Course " . time();
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
            $request->cover->storeAs('img/courses/', $cover);
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

        $result = Course::updateRecord($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListCourse');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelCourse($id)
    {
        $result = Course::deleteRecord($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListCourse')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListCourse')->with('error', 'Xóa thất bại!');
        }
    }

}