<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use CommentableTrait; 
    
    protected $fillable = [
        'faculty',
    ];

    
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
