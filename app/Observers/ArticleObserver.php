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

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 文章观察者
 *
 * Class ArticleObserver
 * @package App\Observers
 */
class ArticleObserver
{
    public function creating(Article $article)
    {
        $article->status = '1';
        $article->order = 9999;
        $article->created_op || $article->created_op = Auth::id();
        $article->updated_op || $article->updated_op = Auth::id();

    }

    public function updating(Article $article)
    {
        $article->updated_op = Auth::id();
    }

    public function updated(Article $article)
    {
        Article::clearCache($article->id);
    }

    public function saving(Article $article)
    {
        // XSS 过滤
        $article->content = clean($article->content, 'user_article_body');

//         生成文章摘录
        $article->description = make_excerpt($article->content);

        $article->attribute = $article->attribute ?? '{}';
        if (is_array($article->attribute)) {
            $article->attribute = json_encode($article->attribute, JSON_UNESCAPED_UNICODE);
        }
    }

    public function saved(Article $article)
    {
        // 分发事件
        $event_class_name = '\\App\\\Events\\' . ucfirst($article->type) . 'SavedEvent';
        class_exists($event_class_name) && event(new $event_class_name($article));
    }

    public function deleted(Article $article)
    {
        \DB::table('replies')->where('article_id', $article->id)->delete();

    }
}