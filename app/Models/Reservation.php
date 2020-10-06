<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['cust_id','arrival_time'];

    public static function today() {
        try {
            $now = date('Y-m-d');

            $res = self::whereDate('arrival_time','=',$now)
                        ->whereTime('arrival_time','>=','00:00')
                        ->whereTime('arrival_time','<=','23:59')
                        ->count();
            return $res;
        } catch(Exception $e) {
            return null;
        }
    }

    public static function newReser($cust_id,$time)
    {
        try {
            $res = self::create([
                'cust_id'        => $cust_id,
                'arrival_time'   => $time
            ]);
            return $res;


        } catch(Exception $e) {
            return null;
        }
    }

}
