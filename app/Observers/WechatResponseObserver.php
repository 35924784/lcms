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

use App\Models\WechatResponse;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 微信响应观察者
 *
 * Class WechatResponseObserver
 * @package App\Observers
 */
class WechatResponseObserver
{
    public function creating(WechatResponse $wechatResponse)
    {
        //
    }

    public function updating(WechatResponse $wechatResponse)
    {
        //
    }

    public function saving(WechatResponse $wechatResponse)
    {
        if(is_array($wechatResponse->content) || is_object($wechatResponse->content)){
            $wechatResponse->content = json_encode($wechatResponse->content, JSON_UNESCAPED_UNICODE);
        }
    }
}