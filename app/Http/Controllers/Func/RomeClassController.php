<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RoomClass;

class RomeClassController extends Controller
{
    /**
     * 获取修改回显
     */
    public function getInfo()
    {
        $res = RoomClass::getInfo();

        return $res ?
            response()->success(200,'房间类别信息获取成功',$res) :
            response()->fail(100,'房间类别信息获取失败',null);
    }

    public function setInfo(Request $request)
    {
        $class1 = $request['class1'];
        $price1 = $request['price1'];
        $class2 = $request['class2'];
        $price2 = $request['price2'];
        $class3 = $request['class3'];
        $price3 = $request['price3'];


        $res = RoomClass::setInfo($class1,$price1,$class2,$price2,$class3,$price3);

        return $res ?
            response()->success(200,'房间类别信息更新成功',null) :
            response()->fail(100,'房间类别信息更新失败',null);
    }
}
