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

     public static function addNew($data)
    {
        try {
            return Course::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateRecord($id, $data)
    {
        try {
            return Course::where('id', $id)->update($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getList($page = 1)
    {
$page--;
        try {
            return Course::orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQuery($query, $page = 0)
    {
        $page--;
        try {
            return Course::where('title', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getSum($query = null)
    {
        try {
            if($query)
            return ceil(Course::where('title', 'like', '%' . $query . '%')->count() / 10);
            else return ceil(Course::count() / 10);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function deleteRecord($id)
    {
        try {
            return Course::where('id', $id)->delete();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getById($id)
    {
        try {
            return Course::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }
}