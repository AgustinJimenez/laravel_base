<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateRole extends FormRequest
{
    private $role;
    public function __construct(\Role $role)
    {
        $this->role = $role;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        [
            'name' => 'unique:' . $this->role->getTable() . '|required',
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
	        'name.unique' => "El nombre ya existe en el sistema"
        ];
    }

}
