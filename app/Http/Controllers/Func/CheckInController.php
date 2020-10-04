<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\CustInfo;
use App\Models\TimeRecord;
use App\Models\CheckRecord;

class CheckInController extends Controller
{
    /**
     * 新客户入住
     */
    public function checkIn(Request $request) {
        $name = $request['name'];
        $code = $request['code'];
        $tel  = $request['tel'];
        $room = $request['room_id'];
        $days = $request['days'];
        $sex  = $request['sex'];

        $in = date('Y-m-d H:i:s');
        $out = date('Y-m-d H:i:s',strtotime('+'.$days.' day'));

        $cust_id = CustInfo::newCust($sex,$name,$code,$tel);
        $time_id = TimeRecord::newIn($in,$out);

        $record = CheckRecord::checkIn($time_id,$cust_id,$room);

        return $record ?
            response()->success(200,$name.'入住成功',null) :
            response()->fail(100,$name.'入住失败',null);
    }
}
