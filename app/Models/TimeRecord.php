<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeRecord extends Model
{
    protected $table = 'time_record';
    public $timestamps = false;
    protected $primaryKey = 'time_id';

    /**
     * 获取今天应该离店店人数
     */
    public static function getLeave() {
        try {
            $now = date('Y-m-d');

            $res = self::whereDate('out_time','=',$now)
                        ->whereTime('out_time','>=','00:00')
                        ->whereTime('out_time','<=','23:59')
                        ->count();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 获取当前入住人数
     */
    public static function nowIn() {
        try {
            $now = date('Y-m-d');

            $res = self::whereDate('out_time','>=',$now)
                        ->count();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    public static function out($TimeID) {
        try {
            $now = date('Y-m-d H:i:s');

            $res = self::where('time_id',$TimeID)
                        ->update(['res_time' => $now]);

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

}
