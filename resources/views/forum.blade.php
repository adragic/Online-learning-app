@extends('layouts.app')

@section('content')
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

                    <form action="{{url('question')}}" method="post" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="question_body" id="question-content" rows="3" placeholder="Your question">
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Other people questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="row-posts">
                        @foreach($questions as $question)
                        <article class="post">
                            <p> {{ $question->question_body }} </p>
                            <div class="info">
                                Posted by {{ $question->user->name }} on {{ $question->created_at }}
                            </div>
                            
                            @if(Auth::user() == $question->user)
                             <!-- Forum Edit Button -->
                            <td>
                                  <form style="display: inline-block;" action="{{url('editquestion/' . $question->id)}}" method="GET">
                                    {{ csrf_field() }}			
                      				    <button type="submit"  class="btn btn-danger">
                      					    <i class="fa fa-btn fa-edit"></i>Edit
                      				    </button>
                      			</form>
                            </td>
                              <!-- Forum Delete Button -->
                            <td>                                            
                                <form action="{{url('question/' . $question->id)}}" method="POST" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-post-{{ $question->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                </form>
                            </td>
                            <!-- Answer-->
                            <form action="{{url('answer')}}" method="post" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="answer_body" id="answer-content" rows="3" placeholder="Your ansewer">
                            </textarea>
                    
                        </div>

                        <button type="submit" class="btn btn-primary">Answer</button>
                        <input type="hidden" value="{{ Session::token() }}" name="token">
                    </form>

                            @endif
                        </article>
                        @endforeach
                        
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection