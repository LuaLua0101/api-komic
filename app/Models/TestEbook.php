<?php

namespace App\Models;

use DB;
use File;
use Illuminate\Database\Eloquent\Model;

class TestEbook extends Model
{
    protected $table = 'test_ebooks';

    public static function ebookTangLuong()
    {
        try {
            DB::beginTransaction();
            $t = TestEbook::where('block_id', 'EBOOK_TANG_LUONG')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function ebookChoBan()
    {
        try {
            DB::beginTransaction();
            $t = TestEbook::where('block_id', 'EBOOK_CHO_BAN')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function testMoiNhat()
    {
        try {
            DB::beginTransaction();
            $t = TestEbook::orderBy('created_at', 'desc')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function banLaAi()
    {
        try {
            DB::beginTransaction();
            $t = TestEbook::where('block_id', 'BAN_LA_AI')->take(4)->get();
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }
//====================================================
    public static function addNewTest($data)
    {
        try {
            return TestEbook::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function addNewEbook($data)
    {
        try {
            return TestEbook::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateRecordTest($id, $data)
    {
        try {
            return TestEbook::where('id', $id)->update($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateRecordEbook($id, $data)
    {
        try {
            return TestEbook::where('id', $id)->update($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListTest($page = 1)
    {
        $page--;
        try {
            return TestEbook::orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListEbook($page = 1)
    {
        $page--;
        try {
            return TestEbook::orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQueryTest($query, $page = 0)
    {
        $page--;
        try {
            return TestEbook::where('title', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQueryEbook($query, $page = 0)
    {
        $page--;
        try {
            return TestEbook::where('title', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getSumTest($query = null)
    {
        try {
            if ($query) {
                return ceil(TestEbook::where('title', 'like', '%' . $query . '%')->count() / 10);
            } else {
                return ceil(TestEbook::count() / 10);
            }

        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getSumEbook($query = null)
    {
        try {
            if ($query) {
                return ceil(TestEbook::where('title', 'like', '%' . $query . '%')->count() / 10);
            } else {
                return ceil(TestEbook::count() / 10);
            }

        } catch (Throwable $e) {
            return null;
        }
    }

    public static function deleteRecordTest($id)
    {
        try {
            $model = TestEbook::find($id);

            $image_path = 'public/admins/img/tests/' . explode("?", $model->cover)[0];
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            return $model->delete();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function deleteRecordEbook($id)
    {
        try {
            $model = TestEbook::find($id);

            $image_path = 'public/admins/img/ebooks/' . explode("?", $model->cover)[0];
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            return $model->delete();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getByIdTest($id)
    {
        try {
            return TestEbook::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getByIdEbook($id)
    {
        try {
            return TestEbook::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }
}