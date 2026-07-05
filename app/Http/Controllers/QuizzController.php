<?php

namespace App\Http\Controllers;

use App\Models\AttemptedQuizz;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quizz;
use App\Models\User;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function index()
    {
        $quizzData = Quizz::all();
        return view('admin.quizzFactory', compact('quizzData'));
    }

    public function cancel()
    {
        session()->forget('quizz_id');
        return redirect('quizz-factory');
    }
    public function create()
    {
        $categories = Category::where('status' , '=' , 'active')->get();
        
        return view('admin.form', [
        'quizz' => new Quizz(),
        'categories' => $categories
    ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:25',
            'category' => 'required',
            'time' => 'required',
            'desc' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $quizz = Quizz::create([
            'title' => $request->title,
            'category' => $request->category,
            'time' => $request->time,
            'desc' => $request->desc,
            'status' => $request->status
        ]);
        $quizz->save();
        session()->put('quizz_id', $quizz->id);
        return redirect('quizz-question');
    }

    public function showEach($id)
    {
        $quizz = Quizz::findOrFail($id);
        $questions = Question::where('quizz_id', $id)->get();

        return view('admin.show', compact('quizz', 'questions'));
    }

    public function edit($id)
    {
        $quizz = Quizz::findOrFail($id);
        return view('admin.form', compact('quizz'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:10|max:25',
            'category' => 'required',
            'time' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);


        $quizz = Quizz::findOrFail($id);

        $quizz->update([
            'title' => $request->title,
            'category' => $request->category,
            'time' => $request->time,
            'desc' => $request->desc,
            'status' => $request->status
        ]);
        return redirect()->route('quizz-factory');
    }
    public function delete($id)
    {
        Quizz::findOrFail($id)->delete(); // No need to assign to a variable before deleting
        return redirect()->back();
    }

    public function adminData()
    {
        $totalUsers = User::where('is_admin', '0')->get();
        $activeQuestions = Question::get();
        $activeQuizzes = Quizz::where('status', 'active')->get();
        $quizzRuns = AttemptedQuizz::get();
        $globalAvrgScore = $quizzRuns->avg('score') ?? 0;
        $passed = AttemptedQuizz::where('score', '>', '50')->get();
        $failed = AttemptedQuizz::where('score', '<=', '50')->get();
        return view('admin.dashboard', compact(
            'totalUsers',
            'activeQuestions',
            'activeQuizzes',
            'quizzRuns',
            'globalAvrgScore',
            'failed',
            'passed'
        ));
    }



}