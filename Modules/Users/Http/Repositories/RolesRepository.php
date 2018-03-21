<?php namespace Modules\Users\Http\Repositories;

class RolesRepository
{
    public $role;

    public function __construct( \Role $role )
    {
        $this->role = $role;
    }

    public function get_roles_list()
    {
        return $this->role->select('id', 'name')->orderBy('name')->get()->pluck('id', 'name')->toArray();
    }

}