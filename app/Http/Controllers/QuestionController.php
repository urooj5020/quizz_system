<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quizz;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

    public function create()
    {

        return view('admin.question', [
            'question' => new Question()
        ]);
    }
    public function addFromExisting($id)
    {
        session()->put('quizz_id', $id);
        return view('admin.question', [
            'question' => new Question()
        ]);
    }
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
        $quizz_id = session('quizz_id');

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

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.question', compact('question'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'option_one' => 'required|string|max:500',
            'option_two' => 'required|string|max:500',
            'option_three' => 'nullable|string|max:500', // Optional (can be blank)
            'option_four' => 'nullable|string|max:500',
            'correct_option' => 'required|in:A,B,C,D', // Retained correct_option
        ]);
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

        $question = Question::findOrFail($id);
        $question->update([
            'content' => $validated['content'],
            'option_one' => $validated['option_one'],
            'option_two' => $validated['option_two'],
            'option_three' => $validated['option_three'],
            'option_four' => $validated['option_four'],
            'correct_key' => $validated['correct_option'],
            'correct_option' => $correctOptionValue,
        ]);

        return redirect()->route('show', ['id' => $question->quizz_id]);
    }
    public function delete($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return back();
    }

    public function startQuizz($id)
    {
        $questionIds = Question::where('quizz_id', $id)->pluck('id')->toArray();
        if (empty($questionIds)) {
            return back()->with('error', "No Questions Found");
        }
        session([
            'quizz_id' => $id,
            'quizz_questions' => $questionIds,
            'quizz_current_index' => 0,
            'quizz_answers' => []
        ]);
        return redirect()->route('show-quizz-question');
    }
    public function showQuestion()
    {
        $questions = session('quizz_questions');
        $currentIndex = session('quizz_current_index', 0);
        if ($currentIndex >= count($questions)) {
            return redirect()->route('quizz-complete');
        }
        $questionId = $questions[$currentIndex];

        $question = Question::findOrFail($questionId);
        return view('quizzQuestion', [
            'question' => $question,
            'currentIndex' => $currentIndex,
            'totalQuestions' => count($questions)
        ]);
    }

    public function submitAnswer(Request $request)
    {
        $request->validate([
            'answer' => 'required'
        ]);
        $questions = session('quizz_questions');
        $currentIndex = session('quizz_current_index', 0);
        $currentQuestionId = $questions[$currentIndex];
        $answers = session('qizz_answers', []);
        $answers[$currentQuestionId] = $request->input('answer');
        session(['quizz_answers' => $answers]);
        // dd(session('quizz_answers'));
        session(['quizz_current_index' => $currentIndex + 1]);

        return redirect()->route('show-quizz-question');
    }
    public function quizzCompletion()
    {
        $quizz_id = session('quizz_id');
        $quizz_info = Quizz::findOrFail($quizz_id);
        return view('quizzComplete', compact('quizz_info'));
    }

    public function review()
    {
        // Fetch all question arrays linked onto the current evaluation template session stream
        $questionIds = session('quizz_questions', []);
        $questions = Question::whereIn('id', $questionIds)->get();

        // Pass user responses array mapping [question_id => user_selected_key]
        $sessionAnswers = session('quizz_answers', []);
        return view('review', compact('questions', 'sessionAnswers'));
    }









}