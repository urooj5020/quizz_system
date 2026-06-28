<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request)
    {
        $quizz_id = session('quizz_id');
        Question::create([
            'content' => $request->question,
            'option_one' => $request->option_one,
            'option_two' => $request->option_two,
            'option_three' => $request->option_three,
            'option_four' => $request->option_four,
            'correct_option' => "jkjjkjnk",
            'quizz_id' => "789"
        ]);
    }
}
