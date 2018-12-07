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

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch($this->method())
        {
            // CREATE
            case 'POST':
                {
                    return [
                        'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
                        'email' => 'required|email|unique:users,email',
                        'introduction' => 'max:80',
                        'avatar' => 'max:150',
                        'sex' => 'required|'.Rule::in(['0','1']),
                        'phone' => 'nullable|regex:/^1[3456789]\d{9}$/|unique:users',
                    ];
                }
            // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::user()->id,
                        'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                        'introduction' => 'max:80',
                        'avatar' => 'max:150',
                        'sex' => 'required|'.Rule::in(['0','1']),
                        'phone' => 'nullable|regex:/^1[3456789]\d{9}$/|unique:users,phone,'. Auth::user()->id,
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
