@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">Your faculty</div>

                <div class="card-body">
                    <div class="list-group">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                        <p>{{$thread->faculty}} </p>
                    

                
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                            <textarea class="form-control" name="body" id="question-content" rows="3" placeholder="Your question">
                            </textarea>
                    
                        </div>

                        <button type="submit" class="btn btn-primary">Create question</button>
                        <input type="hidden" value="{{ Session::token() }}" name="token">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="comment-list">
    @foreach($thread->comments as $comment)
    <h4>{{$comment->body}} </h4>
    <lead> {{$comment->user->name}} </lead>
    @endforeach
</div> -->

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
                    <article class="post">
                            <p> {{ $comment->body }} </p>
                            <div class="info">
                                Posted by {{ $comment->user->name }}
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
                    </article>
                    @endforeach
                    </section>

                
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('js')

    <script>
        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }

    </script>

@endsection