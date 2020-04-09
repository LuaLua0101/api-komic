<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class CourseType extends Model
{
    protected $table = 'course_types';

    public static function getList() {
        try {
            $t = CourseType::get();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
     }
}