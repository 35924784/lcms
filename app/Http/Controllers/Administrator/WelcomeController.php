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

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Auth;

/**
 * Welcome 控制器
 *
 * Class WelcomeController
 * @package App\Http\Controllers\Administrator
 */
class WelcomeController extends Controller
{
    
    public function __construct()
    {
        static::$activeNavId = 'dashboard';
    }
    
    /**
     * 仪表盘
     * @return mixed
     */
    public function dashboard(){
        return backend_view("dashboard");
    }

    public function permissionDenied(){
        // 如果当前用户有权限访问后台，直接跳转访问
        if (Auth::user()->can('manage_system')) {
            //return redirect()->route('administrator.dashboard')->status(302);
        }

        // 否则使用视图
        return backend_view('permission_denied');
    }
}
