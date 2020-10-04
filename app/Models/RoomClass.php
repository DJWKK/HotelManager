<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class RoomClass extends Model
{
    public $timestamps = false;
    protected $table = 'room_class';
    protected $primaryKey = 'class_id';

    public static function getInfo()
    {
        try{
            $res = self::all();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 更新类别信息
     */
    public static function setInfo($class1,$price1,$class2,$price2,$class3,$price3) {
        try{
            $res1 = self::where('class_id',1)
                        ->update([
                            'name'  => $class1,
                            'price' => $price1
                        ]);
            $res2 = self::where('class_id',2)
                        ->update([
                            'name'  => $class2,
                            'price' => $price2
                        ]);
            $res3 = self::where('class_id',3)
                        ->update([
                            'name'  => $class3,
                            'price' => $price3
                        ]);
            AdminLog::newLog('更新','管理员 更新 房间类别信息');
            return $res1|$res2|$res3;
        } catch(Exception $e) {
            return null;
        }
    }
}
