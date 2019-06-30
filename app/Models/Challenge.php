<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Challenge extends Model
{
    use CanBeLiked;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_post',
        'user_post_id',
        'user_avatar',
        'user_name', 
        'user',
        'challenger_post',
        'challenger_post_id',
        'challenger_avatar',
        'challenger_name',
        'challenger',
    ];

    /**
     * GEt the user that owns the challenge.
     */
    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user');
    }

    public function challenger()
    {
        return $this->belongsTo('App\Models\User', 'challenger');
    }
}
