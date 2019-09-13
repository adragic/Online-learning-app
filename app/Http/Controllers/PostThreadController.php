<?php


namespace App\Http\Controllers;
use App\PostThread;

use Illuminate\Http\Request;

class PostThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $postthreads =PostThread::orderBy('created_at','asc')->get();
        return view('postthread', ['postthreads'=> $postthreads]);
        
    }
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'faculty' => 'required|max:1500',
        ]);

        //store
        $request->user()->postthreads()->create([
            'faculty' => $request->faculty,
            
        ]);
        
        return back();
    }

    public function show($id)
    {
        $postthread =postThread::find($id);
        
        return view('postthreadsingle',['postthread'=> $postthread]);
    }
}
