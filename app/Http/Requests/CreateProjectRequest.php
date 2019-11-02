<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProjectRequest extends FormRequest
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
        return [
            'name'=>[
                'required',
//                用了系统自带的rule类，调用他的unique方法，后面是where查询语句，里面放了密名函数
                    Rule::unique('projects')->where(function($query){
                        return $query->where('user_id', request()->user()->id);
                        })
            ],
            'thumbnail'=>'image|dimensions:min_width=20,min_height=20'
        ];
    }
//laravel预先定义好的方法
    public function messages()
    {
        return [
            'name.required'=>'名字'
        ];
    }
}
