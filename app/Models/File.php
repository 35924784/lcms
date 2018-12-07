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
 * 文件模型
 *
 * Class File
 * @package App\Models
 */
class File extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','type', 'disks', 'path', 'mime_type', 'md5', 'title', 'folder', 'object_id', 'storage_id', 'size', 'width', 'height', 'downloads', 'public', 'editor', 'status', 'created_op'];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
}
