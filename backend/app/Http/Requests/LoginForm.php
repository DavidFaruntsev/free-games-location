<?php

namespace App\Http\Requests;

use App\DataTransferObjects\LoginDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class LoginForm extends FormRequest
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
            'email' => 'required', 'email',
            'password' => 'required', 'string',
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function toDto(): LoginDTO
    {
        return new LoginDTO(
            email: $this->input('email'),
            password: $this->input('password'),
        );
    }
}
