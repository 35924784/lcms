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

use App\Models\Slide;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 幻灯观察者
 *
 * Class SlideObserver
 * @package App\Observers
 */
class SlideObserver
{
    public function creating(Slide $slide)
    {
        $slide->object_id = create_object_id();
        $slide->status = '1';
        $slide->order = 9999;
    }


    public function updating(Slide $slide)
    {
        
    }
}