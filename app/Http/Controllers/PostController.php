<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostThread;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $threads =PostThread::orderBy('created_at','asc')->get();
        return view('postthread', ['threads'=> $threads]);
        
    }

    public function addThreadPost(Request $request, PostThread $postthread)
    {

        $this->validate($request, [
            'body' => 'required|max:1500',
        ]);
       $post = new Post();
        $post->body = $request->body;
        $post->file = $request->file->getClientOriginalName();
        $post->user_id = auth()->user()->id;
        $postthread->posts()->save($post);
      
        //store file
        if( $request->has('file')) {
          $filename=  $request->file('file')->getClientOriginalName();
           $request->file->storeAs('public/files', $filename);
        }

        return back();
    }

    
     
     /**
     * Destroy the given post.
     *
     * @param  Request  $request
     * @param  Project  $post
     * @return Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('destroy', $post);

        $post->delete();

        return back();
    }
    public function edit(Post $post)
    {
        $this->authorize('checkowner', $post);
        return view('edit', [
            'post' => $post,
        ]);
    }
    /**
     * Update the current post
     * 
     * @param Request $request
     * @param Project $post
     * @return type
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('checkowner', $post);
        $post->update($request->all());
        return redirect('/postthread');
    }

    public function downloadfunction(Post $post)
    { 
        $downloads=DB::table('posts')->get();
        return back(compact('downloads'));

    }
}
