<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCareer extends Model
{
    protected $table = 'job_and_careers';

    public static function clearAll($job_id)
    {
        try {
            return JobCareer::where('job_id', $job_id)->delete();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function addNew($data)
    {
        try {
            return JobCareer::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }
}