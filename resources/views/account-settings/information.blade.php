@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-4">
            <div class="list-group border-0 box-shadow">
                <a href="#" class="list-group-item list-group-item-action disabled">
                    <i class="fas fa-fw mr-1 fa-bars"></i> Account configuration
                </a>

                <a href="#" class="list-group-item list-group-item-action active">
                    <i class="fas fa-info-circle fa-fw mr-1"></i> Account information
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-key fa-fw mr-1"></i> Account security
                </a>
            </div>

            <div class="list-group border-0 box-shadow my-3">
                <a href="#" class="list-group-item list-group-item-danger list-group-item-action">
                    <i class="far fa-trash-alt fa-fw mr-1"></i> Delete your account
                </a>
            </div>
        </div>

        <div class="col-8">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">Account information</h6>

                    <form method="POST" action="{{ route('profile.settings.info') }}">
                        @csrf               {{-- Form field protection --}}
                        @method('patch')    {{-- HTTP method spoofing --}}
                        @form($user)        {{-- Bind the user data to the form --}}

                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">Your name: <span class="input-required">*</span></label>

                            <div class="col-9">
                                <input type="text" placeholder="Your name" class="form-control @error('name', 'is-invalid')" @input('name') id="name">
                                @error('name', '<div class="invalid-feedback">:message</div>')
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email address <span class="input-required">*</span></label>
                            <div class="col-9">
                                <input type="text" id="email" placeholder="Your email address" class="form-control @error('email', 'is-invalid')" @input('email') id="email">
                                @error('email', '<div class="invalid-feedback">:message</span>')
                            </div>
                        </div> 

                        <div class="form-group row">
                            <div class="offset-3 col-9">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-fw fa-check"></i> Update
                                </button>

                                <button type="reset" class="btn btn-outline-danger">
                                    <i class="fas fa-fw fa-undo"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection