<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Degree;

class DegreeController extends Controller
{
    public function index()
    {
        $data = Degree::getList();

        return view('admin.degrees.list')->with('data', $data);
    }
}