@extends('layouts.app')

@section('content')
<!-- faculty -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">{{$thread->faculty}} </div>

            </div>
        </div>
    </div>
</div> 

<!-- new comment-question-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">Post your question</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('threadcomment.store',$thread->id)}}" method="post" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="question-content" rows="3" placeholder="Your question"></textarea>
                    
                        </div>

                        <button type="submit" class="btn btn-primary">Create question</button>
                        <input type="hidden" value="{{ Session::token() }}" name="token">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- all questions and answers-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">Questions</div>

                <div class="card-body">
                    <div class="list-group">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section class="row-posts">
                    
                       
                    @foreach($thread->comments as $comment)
                    <!-- display each question in separate card body -->
                    <div class="row justify-content-center ">
                    <div class="card w-75 ">
                    <div class="card-body">

                    <article class="post">
                            <p> {{ $comment->body }} </p>
                            <div class="info">
                                Posted by {{ $comment->user->name }} on {{ $comment->created_at }}
                            </div>

                            @if(Auth::user() == $comment->user)
                            
                             <!-- Forum Edit Button -->
                            <td>
                                  <form style="display: inline-block;" action="{{url('editcomment/'. $comment->id )}}" method="GET">
                                    {{ csrf_field() }}			
                      				    <button type="submit"  class="btn btn-danger">
                      					    <i class="fa fa-btn fa-edit"></i>Edit
                      				    </button>
                      			</form>
                            </td>
                              <!-- Forum Delete Button -->
                            <td>                                   
                                <form action="{{url('comment/'. $comment->id)}}" method="POST" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-post" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                </form>
                            </td>
                            @endif
                    
<br><br>
                     <!-- Answer-->
                    <form action="{{route('replycomment.store', $comment->id)}}" method="post" >
                         {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="answer-content" rows="3" 
                            placeholder="Your answer"></textarea>
                    
                        </div>

                        <button type="submit" class="btn btn-primary">Answer</button>
                        <input type="hidden" value="{{ Session::token() }}" name="token">
                    </form>
                    
<br><br>

                            <!-- reply list-->
                     @foreach($comment->comments as $reply)

                    <!-- card inside card inside card -->
                    <div class="row justify-content-center">
                    <div class="card w-75">
                    <div class="card-body">

                        <article class="post reply-list">
                            <p> {{ $reply->body }} </p>
                            <div class="info">
                                Posted by {{ $reply->user->name }} on {{ $reply->created_at }}
                            </div>

                            @if(Auth::user() == $reply->user)
                            
                             <!-- Forum Edit Button -->
                            <td>
                                  <form style="display: inline-block;" action="{{url('editreply/'. $reply->id )}}" method="GET">
                                    {{ csrf_field() }}			
                      				    <button type="submit"  class="btn btn-danger">
                      					    <i class="fa fa-btn fa-edit"></i>Edit
                      				    </button>
                      			</form>
                            </td>
                              <!-- Forum Delete Button -->
                            <td>                                   
                                <form action="{{url('reply/'. $reply->id)}}" method="POST" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-post" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                </form>
                            </td>
                            @endif

                        </article>
                        </div></div></div> <!-- end of card inside card inside card -->
                        <br> <!-- break between replies -->
                        @endforeach  <!-- end of reply list-->
                    
                        </article>
                     </div></div></div> <!-- end of -display each question in separate card body -->
                     <br> <!-- break between questions -->
                    @endforeach <!-- end of question list-->
                    
                   
                    </section>

                
                   
                 </div> <!-- end list-group -->
                </div>  <!-- end card-body -->
                
                
            </div>  <!-- end card-->
        </div>
    </div>
</div>  <!-- end container-->



@endsection
