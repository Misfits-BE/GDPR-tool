@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-4">
            @include ('account-settings.partials.sidenav')
        </div>

        <div class="col-8">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">Account security</h6>

                    <form method="POST" action="{{ route('profile.settings.sec') }}">
                        @csrf            {{-- Form field protection --}}
                        @method('PATCH') {{-- HTTP method spoofing --}}

                        <div class="form-group row">
                            <label for="password" class="col-3 col-form-label">New password <span class="input-required">*</span></label>

                            <div class="col-9">
                                <input class="form-control @error('password', 'is-invalid')"
                                       id="password"
                                       placeholder="Your new password"
                                       type="password"
                                       @input('password')>

                                @error('password', '<div class="invalid-feedback">:message</div>')
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirmation" class="col-3 col-form-label">Confirmation <span class="input-required">*</span></label>

                            <div class="col-9">
                                <input type="password"
                                       class="form-control @error('password_confirmation', 'is-invalid')"
                                       aria-describedby="confirmationHelpBlock"
                                       placeholder="Confirm your password"
                                       id="confirmation"
                                       @input('password_confirmation')>

                                @if ($errors->has('password_confirmation'))
                                    @error('password_confirmation', '<div class="invalid-feedback">:message</div>')
                                @else {{-- No validation errors are found --}}
                                    <small id="confirmationHelpBlock" class="form-text text-muted">
                                        <span class="input-required">*</span>
                                        Re-type your newly password form the input above.
                                    </small>
                                @endif
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