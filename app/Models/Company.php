<?php

namespace App\Models;

use File;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public static function DNGanBan()
    {
        try {
            DB::beginTransaction();
            $t = Company::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function DNCanBan()
    {
        try {
            DB::beginTransaction();
            $t = Company::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function congTyDaLuu()
    {
        try {
            DB::beginTransaction();
            $t = Company::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function addNew($data)
    {
        try {
            return Company::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateRecord($id, $data)
    {
        try {
            return Company::where('id', $id)->update($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getList($page = 1)
    {
        $page--;
        try {
            return Company::orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQuery($query, $page = 0)
    {
        $page--;
        try {
            return Company::where('title', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getSum($query = null)
    {
        try {
            if ($query) {
                return ceil(Company::where('title', 'like', '%' . $query . '%')->count() / 10);
            } else {
                return ceil(Company::count() / 10);
            }

        } catch (Throwable $e) {
            return null;
        }
    }

    public static function deleteRecord($id)
    {
        try {
            $model = Company::find($id);

            $image_path = 'public/admins/img/companies/' . explode("?", $model->logo)[0];
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
            return Company::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }
}