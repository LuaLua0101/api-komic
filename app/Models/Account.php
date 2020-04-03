<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Account extends Model
{
    protected $table = "users";

    public static function register($data)
    {
        try {
            DB::beginTransaction();

            $t = new Account();
            $t->name = $data->name;
            $t->email = $data->email;
            $t->phone = $data->phone;
            $t->password = Hash::make($data->password);
            $t->created_at = time();
            $t->save();

            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateFCM($fcm)
    {
        try {
            DB::beginTransaction();

            $t = Account::find(auth()->user()->id);
            $t->fcm_token = $fcm;
            $t->updated_at = time();
            $t->save();

            DB::commit();
            return $t;
        } catch (Throwable $e) {
            return null;
        }
    }
}