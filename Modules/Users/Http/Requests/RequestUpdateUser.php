<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateUser extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        [
            'name' => 'required|max:255',
	        'email' => 'unique:' . $this->route('user')->getTable() . ',email,' . $this->route('user')->id . '|email'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return 
        [
            'name.required' => 'El nombre es requerido',
	        'name.max' => 'El nombre debe de tener un minimo de :max caracteres',
	        'email.unique' => "El email ya existe en el sistema",
	        'email.email' => "El email es invalido"
        ];
    }
}
