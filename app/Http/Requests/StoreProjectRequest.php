<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects|min:5|max:100',
            'description' => 'nullable|max:300',
            'type_id' => 'nullable',
        ];
    }

    public function messages() {
        return [
        'title.required' => 'Il titolo non può essere vuoto',
        'title.unique' => 'Questo titolo è già in uso',
        'title.min' => 'Il titolo deve essere di almeno 5 caratteri',
        'title.max' => 'Il titolo non può superare i 100 caratteri',

        'description.max' => 'La descrizione non può superare i 300 caratteri', 
        ];
    }
}
