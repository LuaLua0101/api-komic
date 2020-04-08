<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    public static function getList()
    {
        try {
            return Province::get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQuery($query)
    {
        try {
            return Province::where('name', 'like', '%' . $query . '%')->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getById($id)
    {
        try {
            return Province::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getNameById($id)
    {
        try {
            $model = Province::find($id);
            return $model ? $model->name : '';
        } catch (Throwable $e) {
            return null;
        }
    }
}