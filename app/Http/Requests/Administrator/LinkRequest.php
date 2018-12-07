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

class LinkRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|max:32',
            'url' => 'required|url|max:191',
            'target' => 'required|'.Rule::in(['_blank','_self']),
            'rating' => 'nullable|integer|max:255',
            'order' => 'nullable|integer',
            'rel' => 'nullable|max:255',
            'description' => 'nullable|max:191',
            'status' => 'nullable|'.Rule::in(['0','1']),
        ];

    }
    
}
