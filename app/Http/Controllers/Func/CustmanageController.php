<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CustInfo;

class CustmanageController extends Controller
{
    /**
     * 获取所有客户列表
     */
    public function getList()
    {
        $res = CustInfo::getList();

        return $res ?
            response()->success(200,'用户列表获取成功',$res) :
            response()->fail(100,'用户列表获取失败',null);
    }

    /**
     * 修改回显
     */
    public function getInfo(Request $request)
    {
        $id = $request['id'];

        $res = CustInfo::theInfo($id);

        return $res ?
            response()->success(200,'用户信息获取成功',$res) :
            response()->fail(100,'用户信息获取失败',null);
    }

    /**
     * 修改
     */
    public function setInfo(Request $request)
    {
        $cust_id = $request['cust'];
        $name = $request['name'];
        $id_code = $request['id_code'];
        $sex = $request['sex'];
        $tel = $request['tel'];

        $res = CustInfo::setInfo($cust_id,$name,$id_code,$sex,$tel);

        return $res ?
            response()->success(200,'用户信息修改成功',null) :
            response()->fail(100,'用户信息修改失败',null);

    }

    /**
     * 搜索
     */
    public function search(Request $request)
    {
        $value = $request['value'];

        $res = CustInfo::search($value);

        return $res ?
            response()->success(200,'用户信息搜索成功',$res) :
            response()->fail(100,'用户信息搜索失败',null);
    }
}
