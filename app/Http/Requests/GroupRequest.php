<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'title' => 'required|max:50',
            'content' => 'required',
            'deadline' => 'required|after:today|after:term_of_apply|after:term_of_selection',
            'reword' => 'required|numeric',
            'number_applicants' => 'required|gte:number_selection',
            'number_selection' => 'required|lte:number_applicants',
            'required_skill' => 'required',
            'term_of_apply' => 'required|date|before:term_of_selection',
            'term_of_selection' => 'required|date|after:term_of_apply|before:deadline'
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'content' => '仕事内容',
            'deadline' => '納期',
            'reword' => '報酬',
            'number_applicants' => '応募人数',
            'number_selection' => '選抜人数',
            'required_skill' => '必要なスキル',
            'term_of_apply' => '応募期間',
            'term_of_selection' => '選抜期間'
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => ':attributeを入力してください。',
            'title.max' => ':attributeは50字以内で入力してください。',
            'content.required' => ':attributeを入力してください。',
            'deadline.required' => ':attributeを入力してください。',
            'deadline.after' => ':attributeは明日以降に設定してください。',
            'deadline.before' => ':attributeは応募期間よりも前に設定してください。',
            'deadline.before' => ':attributeは選抜期間よりも後に設定してください。',
            'reword.required' => ':attributeを入力してください。',
            'reword.numeric' => ':attributeは数字(「,」などを含まない)を入力してください。',
            'number_applicants.required' => ':attributeを入力してください。',
            'number_applicants.gte' => ':attributeは選抜人数以上にしてください。',
            'number_selection.required' => ':attributeを入力してください。',
            'number_selection.lte' => ':attributeは募集人数以下にしてください',
            'required_skill.required' => ':attributeを入力してください。',
            'term_of_apply.required' => ':attributeを入力してください。',
            'term_of_apply.date' => ':attributeは日付を入力してください。',
            'term_of_apply.before' => ':attributeは選抜期間よりも前に設定してください。',
            'term_of_selection.required' => ':attributeを入力してください。',
            'term_of_selection.date' => ':attributeは日付を入力してください。',
            'term_of_selection.after' => ':attributeは応募期間よりも後に設定してください。',
            'term_of_selection.before' => ':attributeは納期よりも後に設定してください。'
        ];
    }
}
