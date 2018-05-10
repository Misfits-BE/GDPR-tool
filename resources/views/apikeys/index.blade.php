@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-4">
            @include('account-settings.partials.sidenav')
        </div>

        <div class="col-8">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">Your API keys</h6>
                </div>
            </div>
        </div>
    </div>
@endsection