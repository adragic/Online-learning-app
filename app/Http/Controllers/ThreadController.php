<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
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
        $threads =Thread::orderBy('created_at','asc')->get();
        return view('thread', ['threads'=> $threads]);
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'faculty' => 'required|max:1500',
        ]);

        //store
        $request->user()->threads()->create([
            'faculty' => $request->faculty,
            
        ]);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread =Thread::find($id);
        
        //return view('forum', compact('thread'));
        return view('threadsingle',['thread'=> $thread]);
    }

    


}
