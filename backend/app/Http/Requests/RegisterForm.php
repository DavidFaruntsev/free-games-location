<?php

namespace App\Http\Requests;

use App\DataTransferObjects\UserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterForm extends FormRequest
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
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5',
            'avatar' => 'nullable|url',
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function toDto(): UserDTO
    {
        return new UserDTO(
            username: $this->input('username'),
            email: $this->input('email'),
            password: $this->input('password'),
            avatar: $this->input('avatar') ?? null,
        );
    }
}
