@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-4">
            @include('account-settings.partials.sidenav')
        </div>

        <div class="col-8">
            <api-keys></api-keys>
        </div>
    </div>
@endsection