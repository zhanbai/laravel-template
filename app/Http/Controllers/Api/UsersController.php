<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function signup(UserRequest $request)
    {
        $cacheKey = 'smsCode_'.$request->phone;
        $code = Cache::get($cacheKey);

       if (!$code) {
           return fail('验证码已失效');
        }

        if (!hash_equals($code, $request->sms_code)) {
            return fail('验证码错误');
        }

        $user = User::create([
            'name' => $request->phone,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        // 清除验证码缓存
        Cache::forget($cacheKey);

        return success($user);
    }

    public function login(UserRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return fail('手机号或密码错误');
        }

        $token = $user->createToken('api')->plainTextToken;

        return success(['token' => $token]);
    }
}
