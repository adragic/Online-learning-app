@extends('layouts.app')

@section('content')
<!-- faculty -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">{{$postthread->faculty}} </div>

            </div>
        </div>
    </div>
</div> 

<!-- new post-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">Post your post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('threadpost.store',$postthread->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                            <textarea class="form-control" name="body" id="post-content" rows="5" placeholder="Your post"></textarea>
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


<!-- all posts-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    <div class="list-group">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section class="row-posts" >
                    @foreach($postthread->posts as $post)

                    <!-- display each post in separate card body -->
                    <div class="row justify-content-center">
                    <div class="card w-75">
                    <div class="card-body">

                    <article class="post">
                            <p> {{ $post->body }} </p>
                            <a href="storage/app/public/files/{{ $post->file }}"  download="{{$post->file  }}">
                            {{$post->file}}
                            </a>
                            <div class="info">
                                Posted by {{ $post->user->name }} on {{ $post->created_at }}
                            </div>

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
                        </div></div></div> <!-- end of -display each post in separate card body -->
                     <br> <!-- break between posts -->
                    @endforeach
                    </section>

                
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
