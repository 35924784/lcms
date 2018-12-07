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

namespace App\Listeners;

use Request;
use Illuminate\Support\Carbon;
use Log;
use Ip;

class UserEventSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 处理用户登录事件。
     */
    public function onUserLogin($event) {
        behavior_log('login','登录了系统.', $event->user->getMorphClass());
    }

    /**
     * 记录用户登录信息
     * @param $event
     */
    public function onUserLoginLast($event) {
        $user = $event->user;
        $user->last_ip = Request::ip();
        $location = Ip::find($user->last_ip);
        $user->last_location = is_array($location) && !empty($location) ? trim(implode(' ', array_slice($location,1,3))) : '未知';
        $user->last_at = now();
        $user->save();
    }

    /**
     * 处理用户注销事件。
     */
    public function onUserLogout($event) {
        behavior_log('logout','退出了系统.', $event->user->getMorphClass());
    }

    /**
     * 为订阅者注册监听器。
     *
     * @param
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLoginLast'
        );

        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}
