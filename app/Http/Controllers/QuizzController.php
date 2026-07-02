<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function index()
    {
        $quizzData = Quizz::all();
        return view('admin.quizzFactory', compact('quizzData'));
    }

    public function cancel(){
        session()->forget('quizz_id');
        return redirect('quizz-factory');
    }
    public function create()
    {

        return view('admin.form', ['quizz' => new Quizz()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:25',
            'category' => 'required',
            'time' => 'required',
            'desc' => 'required',
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
        return view('admin.form', compact('quizz'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:10|max:25',
            'category' => 'required',
            'time' => 'required',
            'desc' => 'required',
        ]);

       
        $quizz = Quizz::findOrFail($id);

        $quizz->update([
            'title' => $request->title,
            'category' => $request->category,
            'time' => $request->time,
            'desc' => $request->desc,
        ]);
        return redirect()->route('quizz-factory');
    }
    public function delete($id)
    {
        Quizz::findOrFail($id)->delete(); // No need to assign to a variable before deleting
        return redirect()->back();
    }

   



}