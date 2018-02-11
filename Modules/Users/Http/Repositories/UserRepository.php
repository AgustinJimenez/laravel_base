<?php namespace Modules\Users\Http\Repositories;

class UserRepository extends \BaseRepository
{
    private $users;

    public function __construct( \User $users )
    {
        //parent::__construct();
        $this->users = $users;
        $this->saved_message = 'Usuario Guardado Correctamente.';
        $this->deleted_message = 'Usuario Eliminado Correctamente';
        $this->updated_message = 'Usuario Actualizado Correctamente';
        $this->index_route_name = 'users.index';
    }



}