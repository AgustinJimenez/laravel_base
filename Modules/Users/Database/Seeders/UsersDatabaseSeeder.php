<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if( !\User::count() )
            $this->call(AdminSeeder::class);
        else
            dd( "THERE IS ALREADY AN USER" );

        Model::reguard();
    }
}
