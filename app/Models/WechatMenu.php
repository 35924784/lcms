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

use EasyWeChat\Kernel\Messages\Text;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
use App\Events\BehaviorLogEvent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * 微信菜单模型
 *
 * Class WechatMenu
 * @package App\Models
 */
class WechatMenu extends Model
{
    use SoftDeletes;
    
    public $table = 'wechat_menu';
    protected $fillable = ['group', 'parent', 'name', 'type', 'data', 'order'];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $dispatchesEvents  = [
        'saved' => BehaviorLogEvent::class,
    ];

    public function titleName(){
        return 'name';
    }

    /**
     * 生成菜单响应
     *
     * @return News|Text|null
     */
    public function handle(){
        switch (strtolower($this->type)){
            case 'text':
                $text = new Text(get_json_params($this->data,'text'));
                return $text;
                break;
            case 'content':
                $items = [];

                $data = is_json($this->data) ? json_decode($this->data) : new \stdClass();
                $category_id = get_value($data, 'category_id', 0);
                $limit = get_value($data, 'limit', 6);

                $results =  Category::find($category_id)->articles()->recent()->offset(0)->limit($limit)->get();
                foreach($results as $article){
                    $items[] = new NewsItem([
                        'title'       => $article->title,
                        'description' => $article->description,
                        'url'         => $article->getLink(),
                        'image'       => $article->getThumb(),
                    ]);
                }

                return new News($items);
                break;
            case 'event':
                // 扩展自定义事件....
                // return Event::$action($this->wechat_id);
                return null;
                break;
            default:
                return null;
                break;
        }
    }
}
