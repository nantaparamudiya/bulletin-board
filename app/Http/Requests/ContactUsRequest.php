<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
        $rules = [
            'phone' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'body' => ['required'],
            'g-recaptcha-response' => ['required', 'recaptcha']
        ];

        $name = ($this->request->get('name')) ? 'name' : ['first_name', 'last_name'];

        if (is_array($name)) {
            foreach ($name as $uname) {
                $rules[$uname] = ['required'];
            }
        } else {
            $rules[$name] = ['required'];
        }

        return $rules;
    }
}
