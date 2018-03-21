<?php namespace Modules\Users\Entities;

use Spatie\Permission\Models\Permission as BasePermission;
use App\Helpers\BaseModelTraits;

class Permission extends BasePermission
{
    use BaseModelTraits;

    public function getAlteredNameAttribute()
    {
        return implode(" > ", explode(".", $this->name));
    }

    public function getRoutesViewsMessagesAttribute()
    {
        return
        [
            /*
            'route_index_name' => 'admin.users.index', 
            'route_create_name' => 'admin.users.create', 
            'route_store_name' => 'admin.users.store', 
            'route_edit_name' => 'admin.users.edit', 
            'route_update_name' => 'admin.users.update',
            'route_delete_name' => 'admin.users.destroy', 
            'route_show_name' => 'admin.users.show', 

            'view_index_name' => 'users::admin.user.index', 
            'view_create_name' => 'users::admin.user.create',
            'view_edit_name' => 'users::admin.user.edit',
            'view_show_name' => 'users::admin.user.show',

            'created_message' => 'Usuario Creado Correctamente',
            'saved_message' => 'Usuario Guardado Correctamente.',
            'updated_message' => 'Usuario Actualizado Correctamente',
            'deleted_message' => 'Usuario Eliminado Correctamente'
            */
        ];
    }

    

    
}