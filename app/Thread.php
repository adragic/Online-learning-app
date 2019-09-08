<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'faculty',
    ];

    
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function question(){
        return $this->hasMany(Question::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    
}
