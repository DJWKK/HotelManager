<?php

namespace App\Http\Controllers\Func;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Log;

class LogController extends Controller
{
    public function getLog()
    {
        $res = Log::getList();

        return $res ?
            response()->success(200,'获取成功',$res) :
            response()->fail(100,'获取失败',null);
    }
}
