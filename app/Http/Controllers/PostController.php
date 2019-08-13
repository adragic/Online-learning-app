<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function store(Request $request)
    {

        $this->validate($request, [
            'body' => 'required|max:1500',
        ]);

        $request->user()->posts()->create([
            'body' => $request->body,
            'file' => $request->file,
        ]);
    
        if($request->hasFile('file')) {
             $file = $request->file;         
             $file->move('files', $file->getClientOriginalName());   
        } 
     return redirect('/home');
    }
     /* if( $file= $request->file('file')){
        $filename = $file->getClientOriginalName();
        $path = $file->storeAS('files', $filename);
dd($path);
        $file->store('files',$filename);
       $post = new Post();
       $post->file =$filename;
    }*/

   /* if($file = $request->file('file')) {
    $input['filename'] = time() . '.' . $file->getClientOriginalExstension();
    $destination = public_path('/files');
    $file->move($destination,$input['filename']);   
}*/


/*if($file = $request->file('file')) {
    $filename = $file->getClientOriginalName();
    Storage::disk('local')->put($filename, File::get($file));
    
}*/


   //     return redirect('/home');
   // }

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

        return redirect('/home');
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
        return redirect('/home');
    }
}
