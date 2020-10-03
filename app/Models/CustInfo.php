<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustInfo extends Model
{
    protected $table = 'cust_info';
    public $timestamps = false;
    protected $primaryKey = 'cust_id';

    /**
     * 新客户入住
     */
    public static function newCust($name,$code,$tel,$room,$days)
    {
        try{
            $date = date('Y-m-d');


            return $res;
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
            return $res;
        } catch(Exception $e) {
            return null;
        }
    }


}
