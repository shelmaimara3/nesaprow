<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['student']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name_team' => 'required|string|max:255',
            'occupation_id' => 'required|integer',
            'title_project' => 'required|string|max:255',
            'desc_project' => 'required|string',
            'proof_project' => 'required|file|mimes:rar,zip',
        ];
    }
}
