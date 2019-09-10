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
                    @foreach($threads as $thread)

                    <a href="{{route('single',$thread->id)}}" class="list-group-item" >
                        <h5 class="list-group-item-heading">{{$thread->faculty}} </h4>
                    </a>

                   <!-- <form style="display: inline-block;" action="{{route('thread.show',$thread->id)}}" method="GET">
                                    {{ csrf_field() }}			
                      				    <button type="submit"  class="btn btn-danger">
                      					    <i class="fa fa-btn fa-edit"></i>Edit
                      				    </button>
                      			</form> -->
                    
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

                    <form action="{{url('thread')}}" method="post" >
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
