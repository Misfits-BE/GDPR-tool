@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-4">
            @include('account-settings.partials.sidenav')
        </div>

        <div class="col-8">
            <div class="card border-0 mb-3 box-shadow">
                <div class="card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">Create new API key.</h6>

                    <form method="POST" action="{{ route('apikeys.store') }}">
                        @csrf {{-- Form field protection --}}

                        <div class="form-group mb-2">
                            <input type="text" id="disabledTextInput" @input('service') class="form-control @error('service', 'is-invalid')" placeholder="Name for the API token.">
                            @error('service', '<div class="invalid-feedback">:message</div>')
                        </div>

                        <button type="submit" class="box-shadow btn btn-outline-success"><i class="fas fa-plus fa-fw"></i> Create</button>
                    </form>

                </div>
            </div>

            <api-keys></api-keys>
        </div>
    </div>
@endsection