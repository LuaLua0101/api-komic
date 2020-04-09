<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table = 'degrees';

    public static function getList()
    {
        try {
            return Degree::get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getById($id)
    {
        try {
            return Degree::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }
}