<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatRequest extends FormRequest
{
    public function authorize(): bool
    {
        $offre = $this->route('offre');

        return $offre && $offre->user_id === $this->user()->id;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'cv_texte' => ['required', 'string', 'min:20'],
        ];
    }
}