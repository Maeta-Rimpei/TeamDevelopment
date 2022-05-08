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
            'deadline' => 'required|after:today',
            'reword' => 'required',
            'number_applicants' => 'required',
            'number_selection' => 'required',
            // 'required_skill' => 'required',
            'term_of_apply' => 'required|date|after:today|before:term_of_selection',
            'term_of_selection' => 'required|date|after:term_of_apply|before:deadline'
        ];
    }
}
