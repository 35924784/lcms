<?php
/**
 * Laravel-cms - cms based on laravel
 *
 * @category  Laravel-cms
 * @package   Laravel
 * @author    Qiangzi <35924784@qq.com>
 * @date      2018/06/06 09:08:00
 * @copyright Copyright 2018 CMS
 * @license   https://opensource.org/licenses/MIT
 * @github    https://github.com/35924784/laravel-cms
 ***
 * @version   Release 1.0
 */

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\UserRequest;
use App\Http\Controllers\Api\Controller;
use App\Transformers\UserTransformer;

/**
 * 用户控制器
 *
 * Class UsersController
 * @package App\Http\Controllers\Api\V1
 */
class UsersController extends Controller
{
    /**
     * 创建
     *
     * @param UserRequest $request
     * @return $this|void
     */
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);
        if (!$verifyData) {
//            return $this->response->error('验证码已失效', 422);
        }

//        if (!hash_equals($verifyData['code'], $request->verification_code)) {
//            // 返回401
//            return $this->response->errorUnauthorized('验证码错误');
//        }

        $isPhoneExists = User::where('phone', '=', $request['phone'])
            ->OrWhere('email', '=', $request['email'])
            ->select('id')
            ->lockForUpdate()
            ->first();
        if ($isPhoneExists) {
            return $this->response->error('手机号或邮箱已存在！', '403');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => bcrypt($request->password),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        return $this->response->item($user, new UserTransformer())
            ->setMeta([
                'access_token' => \Auth::guard('api')->fromUser($user),
                'token_type' => 'Bearer',
                'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
            ])
            ->setStatusCode(201);
    }

    /**
     * 我（当前登录用户）
     *
     * @return \Dingo\Api\Http\Response
     */
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }
}
