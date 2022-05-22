<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'user_id' => required,
            'group_id' => required,
            'status' => required,
            'content' => required
        ];
    }

     /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'comment' => '応募コメント'
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'comment.required' => ':attributeを入力してください。',
        ];
    }
}
