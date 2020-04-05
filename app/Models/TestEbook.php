<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestEbook extends Model
{
    protected $table = 'test_ebooks';

    static function ebookTangLuong() {
        try {
            DB::beginTransaction();
            $t = TestEbook::where('block_id', 'EBOOK_TANG_LUONG')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function ebookChoBan() {
        try {
            DB::beginTransaction();
            $t = TestEbook::where('block_id', 'EBOOK_CHO_BAN')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function testMoiNhat() {
        try {
            DB::beginTransaction();
            $t = TestEbook::orderBy('created_at', 'desc')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function banLaAi() {
        try {
            DB::beginTransaction();
            $t = TestEbook::where('block_id', 'BAN_LA_AI')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }
}