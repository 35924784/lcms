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
use Spatie\Permission\Models\Permission;

/**
 * 权限授权策略
 *
 * Class PermissionPolicy
 * @package App\Policies
 */
class PermissionPolicy extends Policy
{

    public function index(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function manage(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function create(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function update(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function destroy(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }
}
