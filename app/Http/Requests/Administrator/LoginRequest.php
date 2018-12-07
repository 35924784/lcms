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

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string','min:6'],
            'captcha' => ['required','captcha'],
        ];
    }
    
}
