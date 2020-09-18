@if(Session::has('alert'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-danger">{{ Session::get('alert') }}</p>
        </div>
    </div>
@endif
@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
