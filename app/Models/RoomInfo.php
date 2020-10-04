<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomInfo extends Model
{
    protected $table = 'room_info';
    public $timestamps = false;

    /**
     * 获取所有房间当前入住情况
     *      存疑接口
     */
    public static function getCheckInfo() {
        try {
            $res = self::all();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 获取所有房间信息
     *      暂未分页处理
     */
    public static function getRoomList()
    {
        try {
            $res = self::join('room_class as class','class.class_id','room_info.class_id')
                        ->select('room_info.room_id','class.name','class.price')
                        ->get();
            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    /**
     * 修改时回显
     */
    public static function getInfo($room)
    {
        try {
            $res =self::join('room_class as class','class.class_id','room_info.class_id')
                        ->select('room_info.room_id','class.name','class.price')
                        ->where('room_info.room_id',$room)
                        ->get();

            return $res;
        } catch(Exception $e) {
            return null;
        }

    }

    /**
     * 修改房间类别
     */
    public static function setInfo($room,$class)
    {
        try {
            $res =self::where('room_id',$room)
                        ->update([
                            'class_id' => $class
                        ]);
            AdminLog::newLog('修改','管理员 修改 房间'.$room.'类别');
            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

}
