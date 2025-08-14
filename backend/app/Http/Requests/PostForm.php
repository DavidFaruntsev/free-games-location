<?php

namespace App\Http\Requests;

use App\DataTransferObjects\PostDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostForm extends FormRequest
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
            'body' => ['required', 'string', 'max:255'],
            'thread_id' => ['required', 'exists:threads,id'],
            'parent_id' => ['nullable', 'exists:posts,id'],
        ];
    }

    /**
     * Converts validated form data to a PostDTO instance.
     *
     * @return PostDTO
     * @throws UnknownProperties If any provided property does not match the DTO definition.
     */
    public function toDto(): PostDTO
    {
        return new PostDTO(
            body: $this->input('body'),
            image: null,
            likes: 0,
            dislikes: 0,
            thread_id: $this->input('thread_id'),
            user_id: auth()->id(),
            parent_id: $this->input('parent_id')
        );
    }
}
