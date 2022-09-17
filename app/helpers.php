<?php

// API 成功信息返回封装
function success($data = null)
{
    return response(['code' => 1, 'data' => $data, 'msg' => 'ok']);
}

// API 失败信息返回封装
function fail($msg = 'fail', $code = 0)
{
    return response(['code' => $code, 'msg' => $msg]);
}
