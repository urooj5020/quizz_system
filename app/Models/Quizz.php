<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    protected $fillable = [
        'title',
        'category',
        'time',
        'desc',
        'status'
    ];

    public function attempts()
    {
        return $this->hasMany(AttemptedQuizz::class, 'quizz_id');
    }
    public function questions()
{
    return $this->hasMany(Question::class, 'quizz_id'); 
}
}
