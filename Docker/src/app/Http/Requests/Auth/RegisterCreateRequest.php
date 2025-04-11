<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterCreateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'お名前は必須項目です',
            'name.max' => 'お名前は255文字以内で入力してください',
            
            'email.required' => 'メールアドレスは必須項目です',
            'email.email' => '有効なメールアドレス形式で入力してください',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'email.unique' => 'このメールアドレスは既に登録されています',
            
            'password.required' => 'パスワードは必須項目です',
            'password.min' => 'パスワードは6文字以上で入力してください',
            'password.confirmed' => 'パスワード確認が一致しません',
        ];
    }
}
