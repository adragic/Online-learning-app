<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use App\Thread;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions =Question::orderBy('created_at','desc')->get();
        $answers =Answer::orderBy('created_at','desc')->get();
        $threads =Thread::orderBy('created_at','desc')->get();
        return view('forum', ['questions'=> $questions, 'answers'=> $answers,'threads'=> $threads]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request /*, $thread_id*/)
    {
        //
        $this->validate($request, [
            'question_body' => 'required|max:1500',
        ]);

$request->user()->questions()->create([
            'question_body' => $request->question_body,
        ]);
      
     /*  $thread = Thread::find($thread_id);
        $question = new Question();
        $question->question_body = $request->question_body;
        $question->thread()->associate($thread);
        $question->save();*/
        return redirect('/forum');
        //return redirect()->route('single', [$thread->id]);
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        $this->authorize('checkowner', $question);
        return view('editquestion', [
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
        $this->authorize('checkowner', $question);
        $question->update($request->all());
        return redirect('/forum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Question $question)
    {
        //
        $this->authorize('destroy', $question);

        $question->delete();

        return redirect('/forum');
    }
   
}
