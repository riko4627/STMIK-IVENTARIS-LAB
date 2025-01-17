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
            'username' => $this->is('v1/user/update/*') ? 'required|alpha_dash|max:25' : 'required|alpha_dash|max:25|unique:users,username',
            'role' => 'required|in:admin,user',
            'email' => 'required|email|max:50',
            'password' => $this->is('v1/user/update/*') ? 'nullable|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/' : 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
            'password_confirmation' => $this->is('v1/user/update/*') ? 'nullable|same:password' : 'required|same:password',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'username.required' => 'Username wajib diisi',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
            'username.max' => 'Username tidak boleh melebihi dari 25 karakter',
            'username.unique' => 'Username sudah digunakan',
            'role.required' => 'Role wajib diisi.',
            'role.in' => 'Role harus dipilih dari opsi yang tersedia.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 50 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter.',
            'password.regex' => 'Password harus memiliki kombinasi huruf besar, kecil, angka, dan simbol.',
            'password_confirmation.required' => 'Konfirmasi Password wajib diisi.',
            'password_confirmation.same' => 'Password tidak sama.',
        ];
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
