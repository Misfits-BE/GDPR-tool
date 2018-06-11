@extends('layouts.app')

@section('content')
    <div class="row my-3"> {{-- ROW --}}
        <div class="col-3">
            @include ('categories.partials.navigation')
        </div>

        <div class="col-9"> {{-- Content --}}
            <div class="card card-body border-0 box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-3">Create new category</h6>

                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf {{-- Form field protection --}}

                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label">Name <span class="input-required">*</span></label>

                        <div class="col-9">
                            <input type="text" id="name" class="form-control @error('name', 'is-invalid')" placeholder="Name for the category" @input('name')>
                            @error('name', '<div class="invalid-feedback">:message</div>')
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-3 col-form-label"> Description <span class="input-required">*</span></label>

                        <div class="col-9">
                            <textarea @input('dscription') aria-describedby="descHelpBlock" id="description" class="form-control @error('description', 'is-invalid')" placeholder="Category description" rows="7"></textarea>
                        
                            @if ($errors->has('description'))
                                @error ('description', '<div class="invalid-feedback">:message</div>') {{-- Validation error partial --}}
                            @else {{-- No validation errors are found --}}
                                <small id="descHelpBlock" class="form-text text-muted">
                                    <span class="input-required">*</span> Keep the description short as possible.
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-md-9">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="fas fa-plus-circle"></i> Create
                            </button>

                            <button type="reset" class="btn btn-outline-danger">
                                <i class="fas fa-fw fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div> {{-- /// Content --}}
    </div> {{-- /// END ROW --}}
@endsection