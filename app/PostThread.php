<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostThread extends Model
{
    
    protected $fillable = [
        'faculty',
    ];

    
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->morphMany(Post::class, 'postable')->latest();
    }
    
}
