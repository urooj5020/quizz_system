<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{

    public function index()
    {
        $quizzData = Quizz::get()->all();
        return view('admin.quizzFactory', compact('quizzData'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'title' => "required | min:10 | max:25",
            'category' => "required ",
            'time' => "required ",
            'desc' => "required ",
        ]);

        $quizz = Quizz::create([
            'title' => $request->title,
            'category' => $request->category,
            'time' => $request->time,
            'desc' => $request->desc,

        ]);
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
        return view('admin.form' , compact('quizz'));
    }
    public function delete($id)
    {
        $quizz = Quizz::findOrFail($id)->delete();

        return redirect()->back();
    }
}
