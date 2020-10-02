<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RoomInfo;

class RomeManageController extends Controller
{
    /**
     * 获取房间列表
     */
    public function getList()
    {
        $res = RoomInfo::getRoomList();

        return $res ?
            response()->success(200,'房间信息列表获取成功',$res) :
            response()->fail(100,'房间信息列表获取失败',null);
    }

    /**
     * 修改房间信息回显
     */
    public function getInfo(Request $request) {
        $room_id = $request['room_id'];

        $res = RoomInfo::getInfo($room_id);

        return $res ?
            response()->success(200,'房间信息获取成功',$res) :
            response()->fail(100,'房间信息获取失败',null);
    }

    /**
     * 修改房间信息
     */
    public function setInfo(Request $request) {
        $room = $request['room_id'];
        $class = $request['class'];

        $res = RoomInfo::setInfo($room,$class);

        return $res ?
            response()->success(200,'房间信息修改成功',null) :
            response()->fail(100,'房间信息修改失败',null);
    }




}
