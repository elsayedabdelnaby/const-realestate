@if(Session::has('success'))

    <div class="row mt-3">
        <button type="text" class="col-md-6 col-md-offset-3 m-auto btn btn-lg btn-success"
                id="type-error">{{Session::get('success')}}
        </button>
    </div>

@endif
@if(Session::has('error'))

    <div class="row mt-3">
        <button type="text" class="col-md-6 col-md-offset-3 m-auto btn btn-lg btn-danger"
                id="type-error">{{Session::get('error')}}
        </button>
    </div>

@endif
