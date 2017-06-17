<?php

namespace App\Http\Controllers;

use App\Http\Lib\AjaxResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($data){
        $rsp = new AjaxResponse();

        $rsp->success = 1;
        $rsp->data = $data;

        return $rsp->toArray();
    }

    public function errorResponse($code, $msg = null){
        $rsp = new AjaxResponse();

        $rsp->success = 1;
        $rsp->error_code = $code;
        $rsp->error_msg = $msg;

        return $rsp->toArray();
    }
}
