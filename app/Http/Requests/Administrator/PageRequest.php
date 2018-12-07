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

namespace App\Http\Requests\Administrator;

use Illuminate\Validation\Rule;

class PageRequest extends Request
{
    public function rules()
    {

        return [
            'title' => 'required|min:1|max:191',
            'keywords' => 'nullable|max:191',
            'description' => 'nullable|max:191',
            'author' => 'nullable|max:191',
            'source' => 'nullable|max:191',
            'category_id' => 'nullable|integer',
            'content' => 'required|min:1|max:65535',
            'thumb' => 'nullable|max:191',
            'order' => 'nullable|integer',
            'status' => 'nullable|integer',
            'views' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'top' => 'nullable|'.Rule::in(['0','1']),
            'link' => 'nullable|alpha_dash|unique:article|max:191',
            'template' => 'nullable|alpha_dash|max:191',
        ];

    }


}
