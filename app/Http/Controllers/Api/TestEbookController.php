<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\TestEbook;

class TestEbookController extends Controller
{
    public function getEbook4Salary(Request $request)
    {
        $title = Block::getBlockName('EBOOK_TANG_LUONG');
        $data = TestEbook::ebookTangLuong();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }

    public function getEbook4U() {
        $title = Block::getBlockName('EBOOK_CHO_BAN');
        $data = TestEbook::ebookChoBan();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }
    
    public function getNewestTest() {
        $data = TestEbook::testMoiNhat();
       return response()->json(['title' =>'Test mới nhất', 'data'=>$data], 200);
    }

    public function getWhoAreYouTest() {
        $title = Block::getBlockName('BAN_LA_AI');
        $data = TestEbook::banLaAi();
       return response()->json(['title' => $title, 'data'=>$data], 200);
    }
}