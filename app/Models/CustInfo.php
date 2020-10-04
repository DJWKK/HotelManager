<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\AdminLog;

class CustInfo extends Model
{
    protected $table = 'cust_info';
    public $timestamps = false;
    protected $primaryKey = 'cust_id';
    protected $fillable = ['sex','name','id_code','tel','created_at'];

    /**
     * 新客户信息登记
     */
    public static function newCust($sex,$name,$code,$tel)
    {
        try{
            $date = date('Y-m-d');
            $flag = self::where('id_code',$code)
                        ->exists();

            if($flag){
                $res = self::select('*')
                            ->where('id_code',$code)
                            ->get();
            } else {
                $res = self::create([
                    'sex'        => $sex,
                    'name'       => $name,
                    'id_code'    => $code,
                    'tel'        => $tel,
                    'created_at' => $date
                ]);
                AdminLog::newLog('新增','新增客户 身份证号：'.$code);
            }

            return $res->cust_id;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 获得列表
     */
    public static function getList()
    {
        try{
            $res = self::all();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 获取修改回显
     */
    public static function theInfo($id)
    {
        try{
            $res = self::select('*')
                        ->where('cust_id',$id)
                        ->get();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 修改用户信息
     */
    public static function setInfo($cust_id,$name,$id_code,$sex,$tel)
    {
        try{
            $res = self::where('cust_id',$cust_id)
                        ->update([
                            'name'    => $name,
                            'id_code' => $id_code,
                            'tel'     => $tel,
                            'sex'     => $sex
                        ]);
            AdminLog::newLog('修改','管理员 修改 客户信息'.$cust_id);
            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 模糊搜索
     */
    public static function search($value)
    {
        try{
            $res = self::select('*')
                        ->where('name',$value)
                        ->orWhere('name','like','%'.$value.'%')
                        ->get();
            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 删除顾客信息
     */
    public static function delCust($id)
    {
        try{
            $res = self::where('cust_id',$id)
                        ->delete();

            AdminLog::newLog('删除','管理员 删除 客户信息'.$id);
            return $res;
        } catch(Exception $e) {
            return null;
        }
    }


}
