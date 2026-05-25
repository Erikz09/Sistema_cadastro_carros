<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('carro')?->id;

        return [
            'marca'  => 'required|string|min:2|max:50',
            'modelo' => 'required|string|min:2|max:50',
            'ano'    => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'cor'    => 'required|string|min:2|max:30',
            'preco'  => 'required|numeric|min:0',
            'placa'  => 'required|string|size:7|unique:carros,placa,' . $id,
            'foto'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'marca.required'   => 'A marca é obrigatória.',
            'modelo.required'  => 'O modelo é obrigatório.',
            'ano.required'     => 'O ano é obrigatório.',
            'ano.min'          => 'O ano deve ser maior que 1900.',
            'cor.required'     => 'A cor é obrigatória.',
            'preco.required'   => 'O preço é obrigatório.',
            'preco.numeric'    => 'O preço deve ser um número.',
            'placa.required'   => 'A placa é obrigatória.',
            'placa.size'       => 'A placa deve ter exatamente 7 caracteres.',
            'placa.unique'     => 'Essa placa já está cadastrada.',
            'foto.image'       => 'O arquivo deve ser uma imagem.',
            'foto.mimes'       => 'Formatos aceitos: jpg, jpeg, png, webp.',
            'foto.max'         => 'A imagem não pode ultrapassar 2MB.',
        ];
    }
}