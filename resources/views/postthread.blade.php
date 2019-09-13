@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">List of faculties</div>

                <div class="card-body">
                    <div class="list-group">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($postthreads as $postthread)

                    <a href="{{route('postsingle',$postthread->id)}}" class="list-group-item" >
                        <h5 class="list-group-item-heading">{{$postthread->faculty}} </h4>
                    </a>
                    
                    @endforeach
                   
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
                <div class="card-header">You faculty is not on the list? Add it!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('postthread')}}" method="post" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="faculty" id="faculty-content" rows="1" placeholder="Name of the faculty"></textarea>
                    
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                        <input type="hidden" value="{{ Session::token() }}" name="token">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
