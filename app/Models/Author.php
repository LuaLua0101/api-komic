<?php

namespace App\Models;

use File;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "authors";

    public static function addNew($data)
    {
        try {
            return Author::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateRecord($id, $data)
    {
        try {
            return Author::where('id', $id)->update($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getList($page = 1)
    {
        $page--;
        try {
            return Author::orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQuery($query, $page = 0)
    {
        $page--;
        try {
            return Author::where('title', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getSum($query = null)
    {
        try {
            if ($query) {
                return ceil(Author::where('title', 'like', '%' . $query . '%')->count() / 10);
            } else {
                return ceil(Author::count() / 10);
            }

        } catch (Throwable $e) {
            return null;
        }
    }

    public static function deleteRecord($id)
    {
        try {
            $model = Author::find($id);

            $image_path = 'public/admins/img/authors/' . explode("?", $model->avatar)[0];
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            return $model->delete();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getById($id)
    {
        try {
            return Author::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getNameById($id)
    {
        try {
            $model = Author::find($id);
            return $model ? $model->name : '';
        } catch (Throwable $e) {
            return null;
        }
    }
}