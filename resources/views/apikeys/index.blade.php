@extends('layouts.app')

@section('content')
    <div class="row my-3">
        @if (session()->has('flash-message'))
            <div class="col-12">
                <div class="alert mb-3 border-0 box-shadow alert-dismissable alert-{{ session()->get('flash-message.level') }}" role="alert">
                    <h4 class="alert-heading">{{ session()->get('flash-message.title') }}</h4>
                    <p class="mb-0">{{ session()->get('flash-message.content') }}

                        @if (session()->has('key')) {{-- New api key is presetnt in the flash session storage --}}
                            <br>
                            <span class="badge bage-success">
                                <i class="fas fa-fw mr-i fa-key text-success"></i> 
                                <strong>API TOKEN:</strong>
                            </span> 
                            <code>{{ session()->get('key') }}</code> 
                        @endif
                    </p>
                    
                    <hr class="mb-2 mt-2">

                    @if (session()->has('undo'))
                        <a href="{{ session()->get('undo.route') }}" class="btn btn-sm btn-outline-{{ session()->get('flash-message.level') }} mb-0">Undo delete</a>
                    @endif 

                    <button data-dismiss="alert" class="btn btn-sm btn-outline-{{ session()->get('flash-message.level') }}">Close</button>
                </div>
            </div>
        @endif

        <div class="col-3">
            @include('account-settings.partials.sidenav')
        </div>

        <div class="col-9">
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

            @if (count($apikeys) > 0) {{-- There are token(s) found --}}
                <div class="card border-0 mb-3 box-shadow">
                    <div class="card-body">
                        <h6 class="border-bottom border-gray pb-2 mb-3">My API keys</h6>

                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="no-border" scope="col">Name</th>
                                    <th class="no-border" scope="col"></th>
                                    <th colspan="2" class="no-border" scope="col">Last used</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($apikeys) > 0) {{-- There are token(s) found --}}
                                    @foreach ($apikeys as $key) {{-- Loop through the keys --}}
                                        <tr>
                                            <td> {{ ucfirst($key->service) }} </td>
                                            <td><code>{{ substr($key->key, 0, 6) }}{{  str_repeat("*", 24) }}</code></td>
                                            <td> {{ $key->last_used_at->diffForHumans() }} </td>
                                            
                                            <td> {{-- Options --}}
                                                <span class="float-right">
                                                    <a href="{{ route('apikeys.regenerate', $key) }}" class="text-muted">
                                                        <i class="fas mr-1 fa-sync-alt"></i>
                                                    </a>

                                                    <a href="{{ route('apikeys.delete', $key) }}" class="text-danger">
                                                        <i class="fas fa-times-circle"></i>
                                                    </a>
                                                </span>
                                            </td> {{-- --}}
                                        </tr>
                                    @endforeach {{-- END loop --}}
                                @else {{-- Tokens found --}}
                                @endif
                            </tbody>
                        </table>

                        {{ $apikeys->links() }} {{-- Pagination view instance --}}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection