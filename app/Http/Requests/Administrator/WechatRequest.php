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

class WechatRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    // CREATE ROLES
                    'type' => 'required|'.Rule::in(['subscribe','service']),
                    'name' => 'required|min:1|max:64',
                    'account' => 'required|min:1|max:30',
                    'app_id' => 'required|min:1|max:30',
                    'app_secret' => 'required|min:1|max:32',
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'type' => 'required|'.Rule::in(['subscribe','service']),
                    'name' => 'required|min:1|max:64',
                    'account' => 'required|min:1|max:30',
                    'app_id' => 'required|min:1|max:30',
                    'app_secret' => 'required|min:1|max:32',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }
    
}
