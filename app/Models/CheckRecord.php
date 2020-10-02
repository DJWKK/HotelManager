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


}
