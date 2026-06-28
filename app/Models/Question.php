<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [    
        'content',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'correct_option',
        'quizz_id',


       ];
}
