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

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

/**
 * 前台公共控制器
 *
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * 前台首页
     *
     * @return mixed
     */
    public function index()
    {
        return frontend_view('welcome');
    }

    /**
     * 关于我们
     */
    public function company(){
        return frontend_view('company');
    }

    /**
     * 站点地图
     */
    public function map(){
        return frontend_view('map');
    }
}
