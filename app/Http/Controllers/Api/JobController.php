<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Job;

class JobController extends Controller
{
    public function getNearestJob(Request $request)
    {
        $data = Job::viecGanBan();
       return response()->json(['title' => 'Việc gần bạn', 'data'=>$data], 200);
    }

    public function getHotestJob(Request $request)
    {
        $data = Job::viecHot();
       return response()->json(['title' => 'Việc hot', 'data'=>$data], 200);
    }

    public function getNewestJob(Request $request)
    {
        $data = Job::viecMoi();
       return response()->json(['title' => 'Việc mới nhất', 'data'=>$data], 200);
    }

    public function getManagerJob4U(Request $request)
    {
        $title = Block::getBlockName('VIEC_CHO_QUAN_LY');
        $data = Job::viecQuanLyChoBan();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getJob4U(Request $request)
    {
        $title = Block::getBlockName('VIEC_CHO_BAN');
        $data = Job::viecChoBan();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getSavedJob(Request $request)
    {
        $data = Job::viecDaLuu();
       return response()->json(['data'=>$data], 200);
    }
}