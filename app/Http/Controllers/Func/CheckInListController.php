<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CheckRecord;

class CheckInListController extends Controller
{
    /**
     * 获取列表
     */
    public function getList()
    {
       $res = CheckRecord::getList();

       return $res ?
            response()->success(200,'入住记录信息获取成功',$res) :
            response()->fail(100,'入住记录信息获取失败',null);
    }

    /**
     * 删除
     */
    public function delInfo(Request $request)
    {
        $rec_id = $request['rec_id'];

        $res = CheckRecord::del($rec_id);
        return $res ?
            response()->success(200,'信息删除成功',null) :
            response()->fail(100,'信息删除失败',null);
    }

    /**
     * 模糊搜索
     * 房间号 和 住户姓名
     */
    public function search(Request $request)
    {
        $value = $request['value'];

        $res = CheckRecord::search($value);
        return $res ?
            response()->success(200,'信息获取成功成功',$res) :
            response()->fail(100,'信息获取成功失败',null);
    }
}
