@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">Post useful content</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('post')}}" method="post" enctype="multiport/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="post-content" rows="5" placeholder="Your post">
                            </textarea>
                            <input type="file" name="file" id="file" >
                        </div>

                        <button type="submit" class="btn btn-primary">Create post</button>
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
                <div class="card-header">Other people posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="row-posts">
                        @foreach($posts as $post)
                        <article class="post">
                            <p> {{ $post->body }} </p>
                            <p> <img src="{{ asset('public/files/' . $post->file) }}"> </p>
                            <div class="info">
                                Posted by {{ $post->user->name }} on {{ $post->created_at }}
                            </div>
                             <!-- Like Button -->
                            <td>
                      		    <form style="display: inline-block;">
                      												
                      				<button type="submit"  class="btn btn-danger">
                      					<i class="fa fa-btn fa-edit"></i>Like
                      				</button>
                      			</form>
                            </td>
                            <!-- Dislike Button -->
                            <td>
                      		    <form style="display: inline-block;">
                      												
                      				<button type="submit"  class="btn btn-danger">
                      				    <i class="fa fa-btn fa-edit"></i>Dislike
                      				</button>
                      			</form>
                            </td>
                            @if(Auth::user() == $post->user)
                             <!-- Post Edit Button -->
                            <td>
                                  <form style="display: inline-block;" action="{{url('edit/' . $post->id)}}" method="GET">
                                    {{ csrf_field() }}			
                      				    <button type="submit"  class="btn btn-danger">
                      					    <i class="fa fa-btn fa-edit"></i>Edit
                      				    </button>
                      			</form>
                            </td>
                              <!-- Post Delete Button -->
                            <td>                                            
                                <form action="{{url('post/' . $post->id)}}" method="POST" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-post-{{ $post->id }}" class="btn btn-danger">
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

@endsection
