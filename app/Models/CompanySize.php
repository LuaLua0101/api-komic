<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
    protected $table = 'company_sizes';

    public static function getNameById($id)
    {
        try {
            $model = CompanySize::find($id);
            return $model ? $model->size : '';
        } catch (Throwable $e) {
            return null;
        }
    }
}