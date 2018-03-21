<?php namespace Modules\Users\Http\Repositories;
use App\Helpers\BaseRepositoryTraits;
class UserRepository extends \BaseRepository
{
	use BaseRepositoryTraits;
    public $user;
    public $validation_store_rules;
    public $validation_update_rules;
    public $validation_store_messages;
    public $validation_update_messages;

    public function __construct( \User $user )
    {
        $this->user = $user;
	    $this->validation_store_rules = 
	    [
	        'name' => 'required|max:255',
	        'email' => 'unique:' . $this->user->getTable() . '|email',
	        'password' => 'required|min:6|confirmed'
		];
		
	    $this->validation_update_rules = 
	    [
	        'name' => 'required|max:255',
	        'email' => 'unique:' . $this->user->getTable() . '|email',
	        'password' => 'required|min:6|confirmed'
		];
		
	    $this->validation_store_messages = 
	    [
	        'name.required' => 'El nombre es requerido',
	        'name.max' => 'El nombre debe de tener un minimo de :max caracteres',
	        'email.unique' => "El email ya existe en el sistema",
	        'email.email' => "El email es invalido",
	        'password.required' => 'El password es requerido',
	        'password.min' => 'El password debe de contar con :min caracteres minimo',
	        'password.confirmed' => 'El password no coincide con su confirmacion'
		];
		
	    $this->validation_update_messages = 
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

    public function validate_store( &$request )
    {
        return $this->create_validation( $request->all(), $this->validation_store_rules, $this->validation_store_messages );
    }

	
}