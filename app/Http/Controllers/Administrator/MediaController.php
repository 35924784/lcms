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

namespace App\Http\Controllers\Administrator;

use App\Models\File;
use Illuminate\Http\Request;

/**
 * 媒体控制器
 *
 * Class MediaController
 * @package App\Http\Controllers\Administrator
 */
class MediaController extends Controller
{
    
    public function __construct()
    {
        static::$activeNavId = 'media';
    }
    
    /**
     * 图片
     *
     * @param Request $request
     * @param File $file
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function image(Request $request, File $file)
	{
        static::$activeNavId = 'content.images';
        
	    $this->authorize('images', $file);

        $folder = $request->folder ?? '';
        if($folder){
            $file = $file->where('folder', $folder);
        }

	    $paginateLimit = config('administrator.paginate.limit');
		$images = $file->where('type','image')->recent()->paginate(24);

		return backend_view('media.image', compact('images', 'folder'));
	}

    /**
     * 选择图片
     *
     * @param Request $request
     * @param File $file
     * @return mixed
     */
	public function uploadImage(Request $request, File $file){
        $images = $file->where('type','image')->recent()->paginate(18);

        return backend_view('media.upload.image', compact('images'));
    }
}