<?php

namespace App\Http\Requests\Anuncio;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnuncioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string'],
            'imagem' => ['required', 'image'],
            'ddd' => ['required', 'digits:3'],
            'celular' => ['required', 'digits:9'],
            'dom' => ['required', 'string', 'max:255'],
            'seg' => ['required', 'string', 'max:255'],
            'ter' => ['required', 'string', 'max:255'],
            'qua' => ['required', 'string', 'max:255'],
            'qui' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'sab' => ['required', 'string', 'max:255'],
        ];
    }
}
