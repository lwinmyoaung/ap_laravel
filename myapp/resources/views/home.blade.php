@extends('layout')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('root') }}" class="btn btn-success">go to named route</a>
            <a href="posts/create" class="btn btn-success">New Post</a>
            <form id="" action="logout" method="POST" style="display: inline">
                @csrf
                <button class="btn btn-secondary">Logout</button>
            </form>
        </div><br>
        <div class="card">
            <div class="card-header" style="text-align: center">
                Contents
            </div>
            <div class="card-body">
                @foreach($data as $post)
                <div>
                    <h5 class="card-title">{{$post->name}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <div class="form-row">
                    <a style="height: 40px; margin-right: 10px;" href="posts/{{ $post->id }}" class="btn btn-primary">View</a>
                    <a style="height: 40px; margin-right: 10px;" href="posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/posts/{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </div><hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection