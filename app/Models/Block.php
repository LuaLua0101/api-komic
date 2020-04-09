<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Block extends Model
{
    protected $table = 'blocks';

    public static function getList() {
        try {
            $t = DB::table('blocks')->get()->toArray();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
     
     public static function getBlockName($id) {
        try {
            $t = Block::find($id)->name;
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
}