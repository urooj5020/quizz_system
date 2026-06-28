<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    
    public function index(){
        $quizzData = Quizz::get()->all();
        return view('admin.quizzFactory' , compact('quizzData'));
    }

    public function create(Request $request){
        $request->validate([
          'title' => "required | min:10 | max:25",
          'category' => "required ",
          'time' => "required ",
          'desc' => "required ",
        ]);
        Quizz::create([
            'title'=> $request->title,
            'category'=> $request->category,
            'time'=> $request->time,
            'desc'=>$request->desc,
            
        ]);
        return redirect('quizz-question');
    }

    public function showEach($id){
        $quizz = Quizz::findOrFail($id);

        return view('admin.show', compact('quizz'));
    }
}
