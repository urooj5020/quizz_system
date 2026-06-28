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
       
    ];
}
