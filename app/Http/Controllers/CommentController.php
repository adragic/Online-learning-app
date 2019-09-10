<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addThreadComment(Request $request, Thread $thread)
    {

        $this->validate($request, [
            'body' => 'required|max:1500',
        ]);
      //  $comment = new Comment();
       // $comment->body = $request->body;
       // $comment->user_id = auth()->user()->id;
       // $thread->comments()->save($comment);
       $thread->addComment($request->body);
        return back();
    }
    public function addReplyComment(Request $request, Comment $comment)
    {

        $this->validate($request, [
            'body' => 'required|max:1500',
        ]);
      //  $reply = new Comment();
      //  $reply->body = $request->body;
      //  $reply->user_id = auth()->user()->id;
        //save comment on comment
       // $comment->comments()->save($reply);

       $comment->addComment($request->body);
        return back();
    }
    
    public function destroy(Request $request, Comment $comment)
    {
        $this->authorize('destroy', $comment);

        $comment->delete();

        return back();
    }
    public function edit(Comment $comment)
    {
        $this->authorize('checkowner', $comment);
        return view('editcomment', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, Comment $comment, Thread $thread)
    {
        $this->authorize('checkowner', $comment);
        $comment->update($request->all());
        return redirect()->route('single',['thread_id' => 1]);
    }

  
}
