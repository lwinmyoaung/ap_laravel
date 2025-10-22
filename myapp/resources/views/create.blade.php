@extends('layout')

@section('content')
    <div class="container mt-5">

        <div class="card">
            <div class="card-header" style="text-align: center">
                New Post
            </div>
            <div class="card-body">
            <form action="/posts" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Desc">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                <select name="category_id" id="" class="form-control">
                    <option value="">Select Category</option>
                        @foreach( $categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts" class="btn btn-success">Back</a>
            </form>
            </div>
        </div>
    </div>
@endsection