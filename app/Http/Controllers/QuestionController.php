<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AttemptedQuizz;
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
    // 1. Request Validation Shield
    $request->validate([
        'answer' => 'required'
    ]);

    // 2. Fetch Session Matrix Pipelines
    $questions = session('quizz_questions');
    $currentIndex = session('quizz_current_index', 0);

    // Dynamic extraction of active question context
    // Safe check: Agar array mein objects hain to ID lein, warna direct check karein
    $currentQuestionData = $questions[$currentIndex];
    $currentQuestionId = is_object($currentQuestionData) ? $currentQuestionData->id : $currentQuestionData;

    // 3. ✓ FIXED TYPO: 'qizz_answers' ko badal kar 'quizz_answers' kar diya
    $answers = session('quizz_answers', []); // Default clear empty array mapping
    
    // Bind the user selection options direct to the targeted primary key database vector
    $answers[$currentQuestionId] = $request->input('answer');
    
    // 4. Commit Matrix Mutation Stream to Session Storage
    session(['quizz_answers' => $answers]);
    session(['quizz_current_index' => $currentIndex + 1]);

    // 5. Next Node Redirect Sequence
    return redirect()->route('show-quizz-question');
}
    public function quizzCompletion()
    {
        // 1. Session data nikaalein
        $quizz_questions = session('quizz_questions', []);
        $sessionAnswers = session('quizz_answers', []);

        if (empty($quizz_questions)) {
            return redirect()->route('dashboard');
        }

        // 2. Database se un questions ka details uthayein taake correct_key check ho sake
        $questions = Question::whereIn('id', $quizz_questions)->get();

        // Quiz Info metadata load karne ke liye (Assumption: First question se quiz_id mil rahi hai)
        $quizz_info = Quizz::find($questions->first()->quizz_id);

        // 3. Loop chala kar correct answers ko counter mein badhayein
        $totalCorrect = 0;
        foreach ($questions as $question) {
            $userAns = $sessionAnswers[$question->id] ?? null;

            // Agar options submit karte waqt values 1, 2, 3, 4 thin to alphabet conversions map:
            $numToLetterMap = ['1' => 'A', '2' => 'B', '3' => 'C', '4' => 'D'];
            if (isset($numToLetterMap[$userAns])) {
                $userAns = $numToLetterMap[$userAns];
            }

            if ($userAns == $question->correct_key) {
                $totalCorrect++;
            }
        }

        // 4. Percentage calculation math loop
        $totalQuestionsCount = count($quizz_questions);

        $scorePercentage = $totalQuestionsCount > 0 ? round(($totalCorrect / $totalQuestionsCount) * 100) : 0;

        $quizz_id = session('quizz_id');
        $user_id = auth()->id();
        $attemptedRecord = AttemptedQuizz::create([
            'quizz_id' => $quizz_id,
            'user_id' => $user_id,
            'score' => $scorePercentage
        ]);
        // 5. Data View compact pipeline mapping
        return view('quizzComplete', compact(
            'quizz_info',
            'quizz_questions',
            'totalCorrect',
            'scorePercentage'
        ));
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

    public function evaluation()
    {
        return redirect()->route('dashboard');
    }







}