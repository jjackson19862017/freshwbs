<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        # Encrypts passwords
        $this->attributes['password'] = bcrypt($value);
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // Creates a Many to Many relationship with User <-> Permission
        return $this->belongsToMany(Permission::class);
    }

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // Creates a Many to Many relationship with Role <-> User
        return $this->belongsToMany(Role::class);
    }



    // Checks to see if a user has a certain role, see admin
    public function userHasRole($role_name){
        foreach ($this->roles as $role){
            if($role_name == $role->name)
                return true;
        }
    }

    public function getLastLoginAtAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        if($date == Null){
            return "Never Logged in";
        }
        return Carbon::parse($date)->diffForHumans();
    }


}
