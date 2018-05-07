@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-3">
            @include ('users.partials.navigation')
        </div>

        <div class="col-9">
            <div class="card border-o bow-shadow">
                <div class="card-body">
                
                    <div class="alert alert-primary" role="alert">
                        <strong class="mr-1"><i class="fas fa-fw fa-exclamation-triangle"></i> info:</strong>
                        User password will be automatically generated and mailed to the created user.

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" method="POST">
                        @csrf {{-- Form field protection --}}

                        <div class="form-group row">
                            <label for="firstname" class="col-3 col-form-label">User firstname <span class="input-required">*</span></label>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-3 col-form-label">User lastname <span class="input-required">*</span></label>

                            <div class="col-9">
                                <input type="text" class="form-control @error('firstname', 'is-invalid')" placeholder="The lastname from the user" id="lastname" @input('lastname')>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">User Email address <span class="input-required">*</span></label>
                        
                            <div class="col-9">
                                <input type="email" class="form-control @error('email', 'is-invalid')" placeholder="The email address from the user" id="email" @input('email')>
                                @error('email', '<div class="feedback-invalid">:message</div>')
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-3 col-9">
                                <button type="submit" class="btn btn-outline-success"> 
                                    <i class="fas fa-fw fa-user-plus"></i> Create
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
@endsection