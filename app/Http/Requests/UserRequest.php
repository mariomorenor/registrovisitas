<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'confirmed|min:8'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Contrasena'
        ];
    }

    public function messages()
    {
     return [
        'password.min'=> 'La contrasena debe ser de al menos 8 digitos'
     ];   
    }
}
