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
use App\Models\Navigation;

/**
 * 导航授权策略
 *
 * Class NavigationPolicy
 * @package App\Policies
 */
class NavigationPolicy extends Policy
{
    public function index(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }

    public function create(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }

    public function update(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }

    public function destroy(User $user, Navigation $navigation)
    {
        return $user->can('manage_navigation');
    }
}
