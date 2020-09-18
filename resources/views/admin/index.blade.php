@extends('layouts.admin')

@section('content')
    @include('partials.notification')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <p><strong>{{ $post->title }}</strong>
                <a href="{{ route('admin.edit', $post->id) }}">Edit</a>
                <a href="{{ route('admin.delete', $post->id) }}">delete</a>
            </p>
        </div>
    </div>
    @endforeach
@endsection
