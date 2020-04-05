<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Course extends Model
{
    protected $table = 'courses';

    static function khoaHocTuyetVoi() {
        try {
            DB::beginTransaction();
            $t = Course::where('block_id', 'KHOA_HOC_TUYET_VOI')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }

     static function khoaHocHot() {
        try {
            DB::beginTransaction();
            $t = Course::orderBy('buy_count', 'desc')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }

     static function khoaHocQuanLy() {
        try {
            DB::beginTransaction();
            $t = Course::where('block_id', 'KHOA_HOC_QUAN_LY')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }

     static function khoaHocTangLuong() {
        try {
            DB::beginTransaction();
            $t = Course::where('block_id', 'KHOA_HOC_TANG_LUONG')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
     
     static function khoaHocHanhPhuc() {
        try {
            DB::beginTransaction();
            $t = Course::where('block_id', 'KHOA_HOC_HP')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }

     static function khoaHocCuaToi() {
        try {
            DB::beginTransaction();
            $t = Course::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }

     static function khoaHocDaLuu() {
        try {
            DB::beginTransaction();
            $t = Course::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
}