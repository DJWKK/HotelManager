<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;



class Log extends Model
{
    protected $table = 'log';
    public $timestamps = false;
    protected $primaryKey = 'log_id';

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

}
