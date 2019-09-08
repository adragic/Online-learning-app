<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
        'answer_body', 
        
        
    ];

    protected $casts = [
        
        'user_id' => 'int',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function questions(){
        return $this->belongsTo(Question::class);
    }
   
}
