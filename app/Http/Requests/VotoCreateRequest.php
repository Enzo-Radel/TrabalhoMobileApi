<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VotoCreateRequest extends FormRequest
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
            'filme'     => 'required|integer',
            'diretor'   => 'required|integer',
        ];
    }

    public function messages() {
        return [
            'filme.required'    => 'É necessário informar o filme',
            'filme.integer'     => 'O campo filme precisa ser um inteiro',

            'diretor.required'    => 'É necessário informar o diretor',
            'diretor.integer'     => 'O campo diretor precisa ser um inteiro',
        ];
    }
}
