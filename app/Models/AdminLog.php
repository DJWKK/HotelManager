<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class AdminLog extends Model
{
    protected $table = 'log';
    public $timestamps = false;
    protected $primaryKey = 'log_id';
    protected $fillable = ['type','info','time'];
    /**
     * 获取所有日志
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

    public static function newLog($type,$info)
    {
        try{
            $date = date('D F j H:m:i Y');

            $res = self::create([
                'type' => $type,
                'info' => $info,
                'time' => $date
            ]);

            return $res;

        } catch(Exception $e) {
            return null;
        }
    }

}
