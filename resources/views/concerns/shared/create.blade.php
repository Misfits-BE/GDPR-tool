@extends('layouts.app')

@section('content')
    <div class="row my-3"> {{-- ROW --}}
        <div class="col-12"> {{-- Container --}}
            <div class="card card-body border-0 box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-3">New privacy concern</h6>

                <form method="POST" action="{{ route('concern.store') }}"> {{-- Provacy concern form --}}
                    @csrf {{-- Form field protection --}}

                    <div class="form-group row"> {{-- Privacy concern title form-group --}}
                        <label for="name" class="col-3 col-form-label">Concern title <span class="input-required">*</span></label>

                        <div class="col-9">
                            <input type="text" id="name" class="form-control @error('title', 'is-invalid')" placeholder="Title for the privacy concern" @input('title')>
                            @error('title', '<div class="invalid-feedback">:message</div>')
                        </div>
                    </div>

                    <div class="form-group row"> {{-- Domain form-group --}}
                        <label for="domain" class="col-3 col-form-label">Domain for concern <span class="input-required">*</span></label>

                        <div class="col-9">
                            <select id="domain" class="form-control @error('domain_id', 'is-invalid')" @input('domain_id')>
                                <option value="">-- Related domain for the privacy concern --</option>

                                @foreach ($domains as $domain) {{-- Loop through the domains --}}
                                    <option value="{{ $domain->id }}" @if (old('domain_id') == $domain->id) selected @endif>
                                        {{ $domain->name }}
                                    </option>
                                @endforeach {{-- /// END domain loop --}}
                            </select>
                        </div>
                    </div>

                    @if ($currentUser->hasRole('admin')) {{-- Admin protected fields --}}
                        <div class="form-group row"> {{-- Assignee form-group --}}
                            <label name="assignee" class="col-3 col-form-label">Assign concern to: <span class="input-required">*</span></label>

                            <div class="col-9">
                                <select id="assignee" class="form-control @error('assignee_id', 'is-invalid')" @input('assignee_id')>
                                    <option value="">-- Person assigned to this concern --</option>

                                    @foreach ($admins as $admin) {{-- Loop through application admin --}}
                                        <option value="{{ $admin->id }}" @if (old('assignee_id') == $admin->id) selected @endif>
                                            {{ $admin->name }}
                                        </option>
                                    @endforeach {{-- /// END admin loop --}}
                                </select>

                                @error('assignee_id', '<div class="invalid-feedback">:message</div>')
                            </div>
                        </div>
                    @endif {{-- /// END admin protected fields --}}

                    <hr>

                    <div class="form-group row">
                        <label for="content" class="col-3 col-form-label">Concern description: <span class="input-required">*</span></label>

                        <div class="col-9">
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                    </div>

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