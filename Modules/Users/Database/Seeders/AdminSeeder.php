<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Http\Repositories\PermissionsRepository;

class AdminSeeder extends Seeder
{
    
    protected $permissions_repo;
    public function __construct( PermissionsRepository $permissions_repo ) 
    {
        $this->permissions_repo = $permissions_repo;
    }

    public function run()
    {
        
        \DB::beginTransaction();

            $user = \User::create
            ([
                'name' => "Administrator",
                'email' => "admin@admin.com",
                'password' => 'admin', 
            ]);
            $role = \Role::create
            ([
                'name' => "admin"
            ]);
            $user->assignRole( $role->name );
            $role->givePermissionTo( $this->permissions_repo->verify_and_get_permissions()->pluck("name")->toArray() );

        \DB::commit();
        
    }
    

}