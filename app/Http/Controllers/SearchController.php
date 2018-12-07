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
use TeamTNT\TNTSearch\Indexer\TNTIndexer;
use TeamTNT\TNTSearch\TNTSearch;
use App\Handlers\TokenizerHandler;

/**
 * 前台搜索控制器
 *
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{

    /**
     * 搜索首页
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->article($request);
    }

    /**
     *
     * 参考地址：http://tnt.studio/blog/did-you-mean-functionality-with-laravel-scout
     * Github: https://github.com/teamtnt/laravel-scout-tntsearch-driver
     * @param Request $request
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function article(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->paginate(10);

        return frontend_view('search.article', compact('articles', 'query'));
    }


}
