<?php namespace Modules\Users\Entities;

use Spatie\Permission\Models\Role as BaseRole;
use App\Helpers\BaseModelTraits;

class Role extends BaseRole
{
    use BaseModelTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'name', 'guard_name'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = 
    [
        'created_at', 'updated_at'
    ];

    public function getRoutesViewsMessagesAttribute()
    {
        return \Config::get('users.routes-names.roles') + \Config::get('users.views-names.roles');
    }
    
}