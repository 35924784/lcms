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

use EasyWeChat\Factory;
use App\Events\BehaviorLogEvent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * 微信公众号模型
 *
 * Class Wechat
 * @package App\Models
 */
class Wechat extends Model
{
    use SoftDeletes;
    
    public $table = 'wechat';
    protected $fillable = ['type', 'object_id', 'name', 'account', 'app_id', 'app_secret', 'url', 'token', 'qrcode', 'primary', 'certified'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    public $dispatchesEvents  = [
        'saved' => BehaviorLogEvent::class,
    ];

    public function titleName(){
        return 'name';
    }

    public function app(){

        $config = config('wechat.default');
        $config['app_id'] = $this->app_id;
        $config['secret'] = $this->app_secret;

        return Factory::officialAccount($config);
    }
}
