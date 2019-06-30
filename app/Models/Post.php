<?php

namespace eze\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post', 
        'user',
    ];

    /**
     * GEt the user that owns the post.
     */
    public function user()
    {
    	return $this->belongsTo('eze\Models\User', 'user');
    }
}
