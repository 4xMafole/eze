<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 
        'user',
    ];

    /**
     * GEt the user that owns the avatar.
     */
    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user');
    }
}
