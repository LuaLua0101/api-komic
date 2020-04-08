<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        $query = $request->query('query');
        if ($query == null || $query == '') {
            $sum = Job::getSum();
            $page = $page > $sum ? $sum : $page;
            $data = Job::getList($page);
        } else {
            $sum = Job::getSum($query);
            $page = $page > $sum ? $sum : $page;
            $data = Job::getListQuery($query, $page);
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
            'title' => 'Thêm mới công việc',
            'link' => route('adgetAddJob'),
            'search_link' => route('adgetListJob'),
        ];
        return view('admin.jobs.list')->with(['data' => $data, 'action' => $action]);
    }

    public function getAddJob(Request $request)
    {
        $action = [
            'title' => 'Danh sách công việc',
            'link' => route('adgetListJob'),
            'search_link' => route('adgetListJob'),
        ];
        return view('admin.jobs.edit')->with(['action' => $action]);
    }

    public function postAddJob(Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Job " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/jobs/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'title' => $title,
            'cover' => $cover,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'salary_from' => $request->salary_from,
            'salary_to' => $request->salary_to,
            'company_id' => intval($request->company),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = Job::addNew($data);
        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListJob');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetListJob');
        }
    }

    public function getEditJob($id)
    {
        $data = Job::getById($id);
        if ($data) {
            return view('admin.jobs.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListJob');
        }
    }

    public function postEditJob($id, Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Job " . time();
        }

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/jobs/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'title' => $title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'salary_from' => $request->salary_from,
            'salary_to' => $request->salary_to,
            'company_id' => intval($request->company),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $data['cover'] = $cover;
        }

        $result = Job::updateRecord($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListJob');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelJob($id)
    {
        $result = Job::deleteRecord($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListJob')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListJob')->with('error', 'Xóa thất bại!');
        }
    }

}