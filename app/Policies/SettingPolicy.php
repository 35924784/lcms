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
use App\Models\Setting;

/**
 * 设置授权策略
 *
 * Class SettingPolicy
 * @package App\Policies
 */
class SettingPolicy extends Policy
{

    public function basic(User $user, Setting $setting)
    {
        return $user->can("manage_site_basic");
    }

    public function company(User $user, Setting $setting)
    {
        return $user->can("manage_site_company");
    }

    public function contact(User $user, Setting $setting)
    {
        return $user->can("manage_site_contact");
    }
}
