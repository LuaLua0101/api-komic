<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    static function DNGanBan() {
        try {
            DB::beginTransaction();
            $t = Company::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function DNCanBan() {
        try {
            DB::beginTransaction();
            $t = Company::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    static function congTyDaLuu() {
        try {
            DB::beginTransaction();
            $t = Company::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }
}