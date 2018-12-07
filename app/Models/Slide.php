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

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 幻灯模型
 *
 * Class Slide
 * @package App\Models
 */
class Slide extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id','object_id', 'group', 'title', 'description', 'trage', 'link', 'image', 'order', 'status'];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
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
