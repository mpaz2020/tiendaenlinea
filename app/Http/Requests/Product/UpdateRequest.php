<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string|unique:products,name,'.$this->route('product')->id.'|max:255',
            'code'=>'nullable|string|min:8|max:8',
            'sell_price'=>'required|numeric',
            'sub_category_id'=>'integer|required|exists:App\SubCategory,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',
            'short_description'=>'required|string',
            'long_description'=>'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El valor no es correcto',
            'name.required' => 'el campo es requerido',
            'name.unique' => 'ya esta registrado',
            'name.max' => 'solo se permite 255 caracteres',

            'code.string' => 'El valor no es correcto',
            'code.min' => 'se requiere de 8 digitos',
            'code.max' => 'solo se permite 8 digitos',

            'sell_price.required' => 'el campo es requerido',

            'category_id.integer' => 'el valor tiene que ser entero',
            'category_id.required' => 'el campo es requerido',
            'category_id.exists' => 'categoria no existe',

            'provider_id.integer' => 'el valor tiene que ser entero',
            'provider_id.required' => 'el campo es requerido',
            'provider_id.exists' => 'proveedor no existe',
        ];
    }
}
