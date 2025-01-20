<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules()
    {
        $rules = [
            'name' => 'required|max:50',
            'username' => $this->is('v1/users/update/*') ? 'nullable' : 'required|unique:users,username',
            'role' => 'required|in:super admin,admin',
            'email' => $this->is('v1/users/update/*') ? 'nullable|email|max:50' : 'required|email|unique:users,email',
        ];

        if ($this->is('v1/users/update/*')) {
            $rules['password'] = 'nullable|min:8';
            $rules['password_confirmation'] = 'nullable|same:password';
        } else {
            $rules['password'] = 'required|min:8';
            $rules['password_confirmation'] = 'required|same:password';
        }

        return $rules;
    }



    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'not validate',
            'message' => 'cek your validation',
            'code' => 422,
            'data' => $validator->errors()
        ]));
    }
}
