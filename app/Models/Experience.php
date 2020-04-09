<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Experience extends Model
{
    protected $table = 'experiences';

    public static function getList() {
        try {
            $t = DB::table('experiences')->get()->toArray();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
     
     public static function getExperienceName($id) {
        try {
            $t = Experience::find($id)->name;
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
}