<?php namespace Modules\Users\Http\Repositories;

class PermissionsRepository
{
    public $permission;

    public function __construct( \Permission $permission )
    {
        $this->permission = $permission;
    }

    public function verify_and_get_permissions()
    {
        $routes_collection = \Route::getRoutes();

        $routes = $routes_collection->getRoutesByName();

        if
        ( 
            ($routes_count = $routes_collection->count()) != ($permissions_count = $this->permission->where('type', 'route')->count()) and 
            $permissions_count < $routes_count 
        )
            foreach($routes as $name =>  $route)
                if( !$this->permission->where('name', $name)->exists() )
                    $this->permission->create( compact('name')+['type' => 'route'] );
        

        return $this->permission->orderBy('name')->get();

    }
}