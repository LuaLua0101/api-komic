<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    static function viecGanBan() {
        try {
            DB::beginTransaction();
            $t = Job::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function viecHot() {
        try {
            DB::beginTransaction();
            $t = Job::orderBy('apply_count', 'desc')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function viecMoi() {
        try {
            DB::beginTransaction();
            $t = Job::orderBy('created_at', 'desc')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function viecQuanLyChoBan() {
        try {
            DB::beginTransaction();
            $t = Job::where('block_id', 'VIEC_CHO_QUAN_LY')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function viecChoBan() {
        try {
            DB::beginTransaction();
            $t = Job::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function viecDaLuu() {
        try {
            DB::beginTransaction();
            $t = Job::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }
}