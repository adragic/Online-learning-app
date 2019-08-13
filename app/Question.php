<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    //
    protected $fillable = [
        'question_body', 
        
        
    ];

    protected $casts = [
        
        'user_id' => 'int',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
