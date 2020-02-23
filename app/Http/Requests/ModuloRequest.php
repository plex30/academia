<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuloRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>['required'],
            'horas'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'horas.required'=>'El campo horas es obligatorio'
        ];
    }

    public function prepareForValidation(){
        if ($this->nombre!=null) {
            $this->merge([
                'nombre'=> strtoupper($this->nombre)
            ]);
        }
    }
}
