<?php

return 
[
    'name' => 'Users',
    'routes-names' => 
    [
        'users' => 
        [
            'route_name_index' => 'admin.users.index', 
            'route_name_create' => 'admin.users.create', 
            'route_name_store' => 'admin.users.store', 
            'route_name_edit' => 'admin.users.edit', 
            'route_name_update' => 'admin.users.update',
            'route_name_delete' => 'admin.users.destroy', 
            'route_name_show' => 'admin.users.show', 
        ],
        'roles' =>
        [
            'route_name_index' => 'admin.users.role.index', 
            'route_name_create' => 'admin.users.role.create', 
            'route_name_store' => 'admin.users.role.store', 
            'route_name_edit' => 'admin.users.role.edit', 
            'route_name_update' => 'admin.users.role.update',
            'route_name_delete' => 'admin.users.role.destroy', 
            'route_name_show' => 'admin.users.role.show', 
        ]
        
    ],
    'views-names' =>
    [
        'users' => 
        [
            'view_name_index' => 'users::admin.user.index', 
            'view_name_create' => 'users::admin.user.create',
            'view_name_edit' => 'users::admin.user.edit',
            'view_name_show' => 'users::admin.user.show',
        ],
        'roles' =>
        [
            'view_name_index' => 'users::admin.role.index', 
            'view_name_create' => 'users::admin.role.create',
            'view_name_edit' => 'users::admin.role.edit',
            'view_name_show' => 'users::admin.role.show',
        ]
        
    ]
];
