<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CheckRecord extends Model
{
    public $timestamps = false;
    protected $table = 'check_record';
    protected $primaryKey = 'id';

    /**
     * 获取入住总人数
     */
    public static function getCount() {
        try{
            $res = self::select('*')
                        ->count();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 当前入住记录表
     * 入住时默认时间设置为‘2000-01-01’
     */
    public static function checkList() {
        try{

            $res = self::join('time_record as time','time.time_id','check_record.time_id')
                        ->join('cust_info as info','info.cust_id','check_record.cust_id')
                        ->select('check_record.room_id','time.time_id','info.name','info.id_code','time.in_time','time.out_time')
                        ->whereDate('time.res_time','2000-01-01')
                        ->get();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 获取入住记录列表
     */
    public static function getList()
    {
        try{
            $datas = self::join('time_record as time','check_record.time_id','time.time_id')
                        ->join('cust_info as info','check_record.cust_id','info.cust_id')
                        ->select('check_record.id as record_id','check_record.room_id','info.name','info.id_code','time.in_time','time.out_time','time.res_time')
                        ->get();

            for($i = 0;$i<count($datas);$i++) {
                if ($datas[$i]->res_time == '2000-01-01 00:00:00') {
                    $datas[$i]->res_time = null;
                }
            }

            return $datas;
        } catch(Exception $e) {
            return null;
        }

    }

    /**
     * 删除记录
     */
    public static function del($rec_id)
    {
        try{
            $res = self::where('id',$rec_id)
                        ->delete();

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
            $res = self::join('time_record as time','check_record.time_id','time.time_id')
                        ->join('cust_info as info','check_record.cust_id','info.cust_id')
                        ->select('check_record.id as record_id','check_record.room_id','info.name','info.id_code','time.in_time','time.out_time','time.res_time')
                        ->where('info.name',$value)
                        ->orWhere('info.name','like','%'.$value.'%')
                        ->where('check_record.room_id',$value)
                        ->orWhere('check_record.room_id','like','%'.$value.'%')
                        ->get();
            return $res;
        } catch(Exception $e) {
            return null;
        }

    }

}
