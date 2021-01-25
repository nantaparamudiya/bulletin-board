<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulletinBoardRequest extends FormRequest
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
        $allRules = [
            'name'     => ['nullable', 'between:3,16'],
            'title'    => ['required', 'between:10,32'],
            'message'  => ['required', 'between:10,200'],
            'image'    => ['file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        ];

        if ($this->method() === 'POST') {
            $allRules['password'] = ['nullable', 'digits:4'];
            $allRules['user']     = ['sometimes', 'nullable'];
        }

        return $allRules;
    }
}
