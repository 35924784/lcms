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
use App\Models\File;

/**
 * 媒体授权策略
 *
 * Class WechatPolicy
 * @package App\Policies
 */
class FilePolicy extends Policy
{
    public function images(User $user, File $file)
    {
        return $user->can("manage_images");
    }

    public function annex(User $user, File $file)
    {
        return $user->can("manage_annex");
    }

}
