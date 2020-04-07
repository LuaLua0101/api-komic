<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanySize;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($page = 1, $query = null)
    {
        $sum = 0;
        $page = $page < 1 ? 1 : $page;
        if ($query == null || $query == '') {
            $sum = Company::getSum();
            $page = $page > $sum ? $sum : $page;
            $data = Company::getList($page);
        } else {
            $sum = Company::getSum($query);
            $page = $page > $sum ? $sum : $page;
            $data = Company::getListQuery($query, $page);
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

        return view('admin.companies.list')->with('data', $data);
    }

    public function getAddCompany(Request $request)
    {
        return view('admin.companies.add');
    }

    public function postAddCompany(Request $request)
    {
        // name
        $title = $request->title;
        if (!$title) {
            $title = "Company " . time();
        }

        // address
        $address = $request->address;

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/companies/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'name' => $title,
            'address' => $address,
            'logo' => $cover,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $result = Company::addNew($data);

        if ($result) {
            toastr()->success('Thêm mới thành công');
            return redirect()->route('adgetListCompany');
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->route('adgetAddCompany');
        }
    }

    public function getEditCompany($id)
    {
        $data = Company::getById($id);
        if ($data) {
            return view('admin.companies.edit')->with('data', $data);
        } else {
            return redirect()->route('adgetListCompany');
        }
    }

    public function postEditCompany($id, Request $request)
    {
        // title
        $title = $request->title;
        if (!$title) {
            $title = "Company " . time();
        }

        // address
        $address = $request->address;

        // coverFile
        $coverFile = $request->cover;
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('img/companies/', $cover);
            $cover .= '?n=' . time();
        }

        $data = [
            'name' => $title,
            'address' => $address,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $data['logo'] = $cover;
        }

        $result = Company::updateRecord($id, $data);

        if ($result) {
            toastr()->success('Chỉnh sửa thành công');
            return redirect()->route('adgetListCompany');
        } else {
            toastr()->error('Chỉnh sửa thất bại');
            return redirect()->back();
        }
    }

    public function getDelCompany($id)
    {
        $result = Company::deleteRecord($id);
        if ($result) {
            toastr()->success('Xóa thành công');
            return redirect()->route('adgetListCompany')->with('success', 'Xóa thành công!');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->route('adgetListCompany')->with('error', 'Xóa thất bại!');
        }
    }

    public function getCompanySize()
    {
        $data = CompanySize::get();

        return view('admin.company_sizes.list')->with('data', $data);
    }
}