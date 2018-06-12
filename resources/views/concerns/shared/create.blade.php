@extends('layouts.app')

@section('content')
    <div class="row my-3"> {{-- ROW --}}
        <div class="col-12"> {{-- Container --}}
            <div class="card card-body border-0 box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-3">New privacy concern</h6>

                <form method="POST"> {{-- Provacy concern form --}}
                    @csrf {{-- Form field protection --}}

                    <div class="form-group row"> {{-- Privacy concern title form-group --}}
                        <label for="name" class="col-3 col-form-label">Concern title <span class="input-required">*</span></label>

                        <div class="col-9">
                            <input type="text" id="name" class="form-control @error('title', 'is-invalid')" placeholder="Title for the privacy concern" @input('title')>
                            @error('title', '<div class="invalid-feedback">:message</div>')
                        </div>
                    </div>

                    @if ($currentUser->hasRole('admin')) {{-- Admin protected fields --}}
                        <div class="form-group row"> {{-- Assignee form-group --}}
                            <label name="assignee" class="col-3 col-form-label">Assign concern to: <span class="input-required">*</span></label>

                            <div class="col-9">
                                <select id="assignee" class="form-control @error('assignee_id', 'is-invalid')" @input('assignee_id')>
                                    <option value="">-- Person assigned to this concern --</option>

                                    @foreach ($admins as $admin) {{-- Loop through application admin --}}
                                        <option>{{ $admin->name }}</option>
                                    @endforeach {{-- /// END admin loop --}}
                                </select>

                                @error('assignee_id', '<div class="invalid-feedback">:message</div>')
                            </div>
                        </div>
                    @endif {{-- /// END admin protected fields --}}

                    <div class="form-group row"> {{-- SUBMIT/RESET form group --}}
                        <div class="offset-3 col-9">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="fas fa-plus-circle"></i> Create
                            </button>

                            <button type="reset" class="btn btn-outline-danger">
                                <i class="fas fa-fw fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                </form> {{-- /// END privacy concern errors --}}

            </div>
        </div> {{-- /// END container --}}
    </div>
@endsection