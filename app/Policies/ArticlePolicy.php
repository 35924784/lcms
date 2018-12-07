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
use App\Models\Article;

/**
 * 文章授权策略
 *
 * Class ArticlePolicy
 * @package App\Policies
 */
class ArticlePolicy extends Policy
{
    public function index(User $user, Article $article)
    {
        return $user->can('manage_article');
    }

    public function create(User $user, Article $article)
    {
        return $user->can('manage_article');
    }

    public function update(User $user, Article $article)
    {
        return $user->can('manage_article');
    }

    public function destroy(User $user, Article $article)
    {
        return $user->can('manage_article');
    }
}
