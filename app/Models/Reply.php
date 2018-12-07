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

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * 回复模型
 *
 * Class Reply
 * @package App\Models
 */
class Reply extends Model
{
//    use SoftDeletes;
    protected $fillable = ['content'];
    
//    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
