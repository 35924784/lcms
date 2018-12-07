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

namespace App\Policies;

use App\Models\User;
use App\Models\Wechat;

/**
 * 微信公众号授权策略
 *
 * Class WechatPolicy
 * @package App\Policies
 */
class WechatPolicy extends Policy
{
    public function update(User $user, Wechat $wechat)
    {
        return $user->can("manage_wechat");
    }

    public function destroy(User $user, Wechat $wechat)
    {
        return $user->can("manage_wechat");
    }

    public function show(User $user, Wechat $wechat){
        return $user->can("manage_wechat");
    }
}
