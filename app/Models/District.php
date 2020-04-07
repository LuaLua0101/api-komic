<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public static function getList()
    {
        try {
            return District::get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListById($province_id)
    {
        try {
            return District::where('province_id', $province_id)->get();
        } catch (Throwable $e) {
            return null;
        }
    }
}