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
    </div>
</div>
