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

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

/**
 * 导航控制器
 *
 * Class NavigationController
 * @package App\Http\Controllers\Api\V1
 */
class NavigationController extends Controller
{
    /**
     * 列表
     *
     * @param string $navigation_type
     * @return mixed
     */
    public function index($navigation_type = 'desktop')
    {
        return $this->response->array(frontend_navigation($navigation_type));
    }
}
