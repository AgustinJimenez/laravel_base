<?php namespace Modules\Users\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Helpers\BaseModelTraits;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use BaseModelTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'web'; // or whatever guard you want to use
    protected $fillable = 
    [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = 
    [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt( $value );
    }

    public function getRoutesViewsMessagesAttribute()
    {
        return \Config::get('users.routes-names.users') + \Config::get('users.views-names.users');
    }
}
