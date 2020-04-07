<?php

namespace App\Models;

use DB;
use File;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    public static function viecGanBan()
    {
        try {
            DB::beginTransaction();
            $t = Job::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function viecHot()
    {
        try {
            DB::beginTransaction();
            $t = Job::orderBy('apply_count', 'desc')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function viecMoi()
    {
        try {
            DB::beginTransaction();
            $t = Job::orderBy('created_at', 'desc')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function viecQuanLyChoBan()
    {
        try {
            DB::beginTransaction();
            $t = Job::where('block_id', 'VIEC_CHO_QUAN_LY')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function viecChoBan()
    {
        try {
            DB::beginTransaction();
            $t = Job::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function viecDaLuu()
    {
        try {
            DB::beginTransaction();
            $t = Job::take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function addNew($data)
    {
        try {
            return Job::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateRecord($id, $data)
    {
        try {
            return Job::where('id', $id)->update($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getList($page = 1)
    {
        $page--;
        try {
            return job::orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQuery($query, $page = 0)
    {
        $page--;
        try {
            return Job::where('title', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getSum($query = null)
    {
        try {
            if ($query) {
                return ceil(Job::where('title', 'like', '%' . $query . '%')->count() / 10);
            } else {
                return ceil(Job::count() / 10);
            }

        } catch (Throwable $e) {
            return null;
        }
    }

    public static function deleteRecord($id)
    {
        try {
            $model = Job::find($id);

            $image_path = 'public/admins/img/jobs/' . explode("?", $model->cover)[0];
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
            return Job::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }
}