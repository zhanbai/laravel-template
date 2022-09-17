<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SmsCodeRequest;
use Illuminate\Support\Facades\Cache;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class SmsCodesController extends Controller
{
    public function store(SmsCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;

        if (!app()->environment('production')) {
            $code = '1234';
        } else {
            // 生成 4 位随机数，左侧补 0
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

            try {
                $easySms->send($phone, [
                    'template' => config('easysms.gateways.aliyun.templates.register'),
                    'data' => [
                        'code' => $code
                    ],
                ]);
            } catch (NoGatewayAvailableException $exception) {
                $message = $exception->getException('aliyun')->getMessage();
                return fail($message ?: '短信发送异常');
            }
        }

        $cacheKey = 'smsCode_' . $phone;
        $expiredAt = now()->addMinutes(5);
        // 缓存验证码 5 分钟过期
        Cache::put($cacheKey, $code, $expiredAt);

        return success([
            'expired_at' => $expiredAt->toDateTimeString(),
        ]);
    }
}
