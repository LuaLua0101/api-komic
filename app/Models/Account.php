<?php

namespace App\Models;

use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\SMS\SpeedSMSAPI;

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

    public static function addNew($data)
    {
        try {
            return Account::insert($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function updateRecord($id, $data)
    {
        try {
            return Account::where('id', $id)->update($data);
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getList($page = 1)
    {
        $page--;
        try {
            return Account::orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getListQuery($query, $page = 0)
    {
        $page--;
        try {
            return Account::where('name', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->skip($page * 10)->take(10)->get();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getSum($query = null)
    {
        try {
            if ($query) {
                return ceil(Account::where('name', 'like', '%' . $query . '%')->count() / 10);
            } else {
                return ceil(Account::count() / 10);
            }

        } catch (Throwable $e) {
            return null;
        }
    }

    public static function deleteRecord($id)
    {
        try {
            $model = Account::find($id);

            $image_path = 'public/admins/img/users/' . explode("?", $model->avatar)[0];
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            return $model->delete();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function getById($id)
    {
        try {
            return Account::where('id', $id)->first();
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function active()
    {
       
        try {
            $model = Account::findOrFail(auth()->user()->id);
            if($model->active != 1) {
                $r =rand(1000,9999);
                $smsAPI = new SpeedSMSAPI;
                $userInfo = $smsAPI->getUserInfo();
                $phones = [$model->phone];
                $content = "Ma xac nhan OTP tu Balance app la " . $r;
                $type = 1;
                $sender = "brandname";
                
                $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
                if($response) {
                    $model->confirm_code = $r;
                    $model->save();
                    return $response;
                }
            }
            return true;
        } catch (Throwable $e) {
            return null;
        }
    }
}