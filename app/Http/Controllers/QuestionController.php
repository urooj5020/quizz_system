<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        // 1. Structural fields filter validation array
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'option_one' => 'required|string|max:500',
            'option_two' => 'required|string|max:500',
            'option_three' => 'nullable|string|max:500', // Optional (can be blank)
            'option_four' => 'nullable|string|max:500',
            'correct_option' => 'required|in:A,B,C,D', // Retained correct_option
        ]);

        // CRITICAL FIXED: Make sure this key matches exactly what you stored in session before
        // If you used session(['current_quizz_id' => ...]) use 'current_quizz_id' here too!
        $quizz_id = session('current_quizz_id') ?? session('quizz_id');

        $correctOptionValue = null;

        // FIXED: Changed 'correct_answer' to 'correct_option' to match validation array above
        switch ($validated['correct_option']) {
            case 'A':
                $correctOptionValue = $validated['option_one'];
                break;
            case 'B':
                $correctOptionValue = $validated['option_two'];
                break;
            case 'C':
                $correctOptionValue = $validated['option_three'];
                break;
            case 'D':
                $correctOptionValue = $validated['option_four'];
                break;
        }

        // 3. Commit configuration into database storage core
        $q = Question::create([
            'content' => $validated['content'],
            'quizz_id' => $quizz_id,
            'option_one' => $validated['option_one'],
            'option_two' => $validated['option_two'],
            'option_three' => $validated['option_three'],
            'option_four' => $validated['option_four'],
            'correct_key' => $validated['correct_option'],
            'correct_option' => $correctOptionValue,
        ]);

        return view('admin.confirm'); // This will now perfectly output the saved database model object!
    }
}