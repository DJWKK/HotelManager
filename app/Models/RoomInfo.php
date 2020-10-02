<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomInfo extends Model
{
    protected $table = 'room_info';
    public $timestamps = false;

    /**
     * 获取所有房间当前入住情况
     */
    public static function getInfo() {
        try {
            $res = self::all();

            return $res;
        } catch(Exception $e) {
            return null;
        }
    }
}
