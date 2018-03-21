<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateUser extends FormRequest
{
    private $user;
    public function __construct(\User $user)
    {
        $this->user = $user;
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
            'name' => 'required|max:255',
	        'email' => 'unique:' . $this->user->getTable() . '|email',
	        'password' => 'required|min:6|confirmed'
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
	        'email.email' => "El email es invalido",
	        'password.required' => 'El password es requerido',
	        'password.min' => 'El password debe de contar con :min caracteres minimo',
	        'password.confirmed' => 'El password no coincide con su confirmacion'
        ];
    }
}
