<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Block extends Model
{
    protected $table = 'blocks';

     static function getBlockName($id) {
        try {
            DB::beginTransaction();
            $t = Block::find($id)->name;
            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
}