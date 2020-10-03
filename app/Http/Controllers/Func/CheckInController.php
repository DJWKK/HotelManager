<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\CustInfo;

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

        $res = CustInfo::newCust($name,$code,$tel,$room,$days);

        return $res ?
            response()->success(200,$name.'入住成功',null) :
            response()->fail(100,$name.'入住失败',null);
    }
}
