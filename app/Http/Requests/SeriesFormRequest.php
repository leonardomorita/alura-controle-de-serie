<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'name' => ['required', 'min:3']
        ];
    }

    // Método que personaliza as mensagens de erros para um campo específico para uma requisição específica.
    // public function messages()
    // {
    //     return [
    //         'nome.required' => 'O campo nome é obrigatório.',
    //         'nome.min' => 'O campo nome precisa ter pelo menos :min caracteres.'
    //     ];
    // }
}
