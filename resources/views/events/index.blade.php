@extends('layouts.master')

@section('content')

    @foreach($events as $event)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <div class="card-body">
                    <h3 >{{ $event->title  }}</h3>
                    <p class="card-text">{{ $event->description  }}</p>
                    <hr/>
                    <p class="card-text"> Start :  {{ $event->begin_at  }}</p>
                    <p class="card-text"> End : {{ $event->end_at  }}</p>
                    <hr/>
                    <p class="card-text">{{ $event->location  }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('events.show', $event) }}" ><button type="button" class="btn btn-sm btn-outline-secondary">More details </button></a>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $events->links() }}

@endsection
