<?php

namespace App\Http\Requests;

use App\DataTransferObjects\ThreadDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ThreadForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'free_game_id' => ['required', 'integer', 'exists:free_games,game_id'],
        ];
    }

    /**
     * Converts validated form data to a ThreadDTO instance.
     *
     * @return ThreadDTO
     * @throws UnknownProperties If any provided property does not match the DTO definition.
     */
    public function toDto(): ThreadDTO
    {
        return new ThreadDTO(
            title: $this->input('title'),
            description: $this->input('description'),
            user_id: auth()->id(),
            free_game_id: $this->input('free_game_id')
        );
    }
}
