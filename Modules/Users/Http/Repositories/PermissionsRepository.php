<?php namespace Modules\Users\Http\Repositories;

class PermissionsRepository
{
    public $permission;

    public function __construct( \Permission $permission )
    {
        $this->permission = $permission;
    }

    public function get_routes_names_with_object()
    {
        return \Route::getRoutes()->getRoutesByName();
    }

    public function get_routes_names()
    {
        return array_keys( $this->get_routes_names_with_object() );
    }

    public function verify_and_get_permissions()
    {
        foreach($this->get_routes_names_with_object() as $name =>  $route)
            if( !$this->permission->where('name', $name)->exists() )
                $this->permission->create( compact('name')+['type' => 'route'] );
        
        return $this->permission->orderBy('name')->get();

    }
}