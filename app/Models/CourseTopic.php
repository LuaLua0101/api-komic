<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    protected $table = 'course_topics';

    public static function getList()
    {
        try {
            return CourseTopic::get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getById($id)
    {
        try {
            return CourseTopic::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }
}