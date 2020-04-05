<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Course;

class CourseController extends Controller
{
    public function getGreatCourse(Request $request)
    {
        $title = Block::getBlockName('KHOA_HOC_TUYET_VOI');
         $data = Course::khoaHocTuyetVoi();
        return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getHotestSkill(Request $request)
    {
        $title = Block::getBlockName('KHOA_HOC_HOT');
        $data = Course::khoaHocHot();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getCourse4Manager(Request $request)
    {
        $title = Block::getBlockName('KHOA_HOC_QUAN_LY');
        $data = Course::khoaHocQuanLy();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getCourse4Salary(Request $request)
    {
        $title = Block::getBlockName('KHOA_HOC_TANG_LUONG');
        $data = Course::khoaHocTangLuong();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getHappyCourse(Request $request)
    {
        $title = Block::getBlockName('KHOA_HOC_HP');
         $data = Course::khoaHocHanhPhuc();
        return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getMyCourses(Request $request)
    {
         $data = Course::khoaHocCuaToi();
        return response()->json(['data'=>$data], 200);
    }

    public function getSavedCourses(Request $request) {
        $data = Course::khoaHocDaLuu();
        return response()->json(['data'=>$data], 200);
    }
}