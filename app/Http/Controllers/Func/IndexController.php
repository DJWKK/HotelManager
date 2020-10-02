<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CheckRecord;
use App\Models\Reservation;
use App\Models\TimeRecord;
use App\Models\RoomInfo;

class IndexController extends Controller
{
    /**
     * 获取顶部信息
     */
    public function getTitleData() {
        $count = CheckRecord::getCount();
        $reser = Reservation::today();
        $leave = TimeRecord::getLeave();
        $nowIn = TimeRecord::nowIn();

        $res = [
            'count' => $count,
            'reservation' => $reser,
            'leave' => $leave,
            'nowIn' => $nowIn
        ];

        return $res ?
            response()->success(200,'顶部信息获取成功',$res) :
            response()->fail(100,'顶部信息获取失败',null);
    }

    /**
     * 获取正在入住的客房列表
     */
    public function getCoustList() {
        $res = CheckRecord::checkList();

        return $res ?
            response()->success(200,'住房信息获取成功',$res) :
            response()->fail(100,'住房信息获取失败',null);
    }

    /**
     * 获取当前所有客房状况
     */
    public function getRoomInfo() {
        $res = RoomInfo::getCheckInfo();

        return $res ?
            response()->success(200,'客房信息获取成功',$res) :
            response()->fail(100,'客房信息获取失败',null);
    }

    /**
     * 获取近期经营情况
     */
    public function getOperatInfo() {
        $res = '';

        return $res ?
            response()->success(200,'近期经营状况获取成功',$res) :
            response()->fail(100,'近期经营状况获取失败',null);
    }

    /**
     * 获取近期入住情况
     */
    public function getCheckInfo() {
        $res = '';

        return $res ?
            response()->success(200,'近期入住状况获取成功',$res) :
            response()->fail(100,'近期入住状况获取失败',null);
    }

    /**
     * 客户退房
     */
    public function checkOut(CheckOutRequest $request) {
        $ID = $request['TimeID'];

        $res = TimeRecord::out($ID);

        return $res ?
            response()->success(200,'退房成功',null) :
            response()->fail(100,'退房失败',null);
    }

    /**
     * 测试方法
     */
    public function test(){
        $res = TimeRecord::out(1);
        return response()->success(200,'获取成功',$res);
    }
}
