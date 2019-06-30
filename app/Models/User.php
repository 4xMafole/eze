<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanLike;

class User extends Authenticatable
{
    use Notifiable,CanFollow,CanBeFollowed,CanLike;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the avatar associated with the user.
     */

    public function avatar()
    {
        return $this->hasOne('App\Models\Avatar', 'user');
    }

    /**
     * Get the posts associated with the user.
     */
    public function post()
    {
        return $this->hasMany('App\Models\Post', 'user');
    }

    /**
     * Get the user's challenge post associated with the user.
     */
    public function challenge_post()
    {
        return $this->hasMany('App\Models\Challenge', 'user');
    }
    
    /**
     * GEt the challenged post associated with the user.
     */
    public function challenged_post()
    {
        return $this->hasMany('App\Models\Challenge', 'challenger');
    }

}
