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
 * 表单模型
 *
 * Class File
 * @package App\Models
 */
class Form extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id','object_id', 'form', 'user_id', 'ip', 'location', 'data', 'status', ];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * 复写获取属性方法，扩展自定义复合属性
     *
     * @param string $key
     * @return mixed|null
     */
    public function getAttribute($key){

        $value = parent::getAttribute($key);

        $data = parent::getAttribute('data');

        if(is_array($data)){
            $data = empty($data) ? new \stdClass() : $data;
        }else if( is_string( $data ) ){
            $data = empty($data) ? new \stdClass() : json_decode($data, true);
        }

        if( $key !== $value && is_array($data) && array_key_exists($key, $data)){
            $value = $data[$key] ?? null;
        }

        return $value;
    }
    
}
