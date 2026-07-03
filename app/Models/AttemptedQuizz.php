<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttemptedQuizz extends Model
{
   protected $fillable = [
    'quizz_id',
    'user_id',
    'score'
       ];

}
