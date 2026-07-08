<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttemptedQuizz extends Model
{
    protected $fillable = [
        'quizz_id',
        'user_id',
        'score',
    ];

    // App\Models\AttemptedQuiz.php mein
    public function quiz()
    {
        return $this->belongsTo(Quizz::class, 'quizz_id');
    }
}
