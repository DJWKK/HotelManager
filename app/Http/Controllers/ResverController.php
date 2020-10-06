<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\CustInfo;

class ResverController extends Controller
{
    /**
     * 客户预约
     */
    public function resver(Request $request)
    {
        $sex = $request['sex'];
        $name = $request['name'];
        $code = $request['code'];
        $tel = $request['tel'];

        $cust_id = CustInfo::newCust($sex,$name,$code,$tel);

        $time = $request['date'] . ' ' . $request['time'];

        $res = Reservation::newReser($cust_id,$time);

        return $res ?
            response()->success(200,'预约成功',null) :
            response()->fail(100,'预约失败',null);
    }
}
