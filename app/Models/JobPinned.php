<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPinned extends Model
{
    protected $table = 'job_user_pinneds';

    public static function clearAll($job_id)
    {
        try {
            return JobPinned::where('job_id', $job_id)->delete();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function addNew($data)
    {
        try {
            return JobPinned::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }
}