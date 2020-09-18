@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">The beautiful Laravel</p>
        </div>
    </div>
    @foreach($posts as $post)

        <p style="font-weight: bold; text-align: center">
        @foreach($post->tags as $tag)
            - {{ $tag->name }} -
         @endforeach
        </p>

    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{ $post->title }}</h1>
            <p>{{ $post->content }} </p>
            <p><a href="{{ route('blog.post', ['id' => $post->id ]) }}">Read more...</a></p>
        </div>
    </div>
    <hr>
    @endforeach
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
