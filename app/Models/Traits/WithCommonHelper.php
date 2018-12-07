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

namespace App\Models\Traits;

use Carbon\Carbon;
use Cache;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

/**
 * 模型公共功能方法
 *
 * Trait WithCommonHelper
 * @package App\Models\Traits
 */
trait WithCommonHelper
{

    /**
     * 获取模板
     *
     * @param int $category
     * @return string
     */
    public function getTemplate($category = 0){
        $template = 'show';

        if($this->template){
            $template = $template . '-' . strtolower($this->template);
        }else if( $category && ($category = Category::show($category,'article')) && $category->template ){
            $template = $template . '-' . strtolower($category->template);
        }

        return $template;
    }
    
    /**
     * 获取作者
     *
     * @param $value
     *
     * @return string
     */
    public function getAuthorAttribute($value){
        return empty($value) ? '管理员' : $value;
    }

    /**
     * 追加过滤条件
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
