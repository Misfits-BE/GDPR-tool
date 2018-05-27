@extends('layouts.app')

@section('content')
    <div class="row my-3"> {{-- ROW --}}
        <div class="col-3">
            @include ('categories.partials.navigation')
        </div>

        <div class="col-9"> {{-- Content --}}
            <div class="card card-body border-0 box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-3">Create new privacy concern category</h6>

                <form method="POST" action="">
                    @csrf {{-- Form field protection --}}

                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label">Name <span class="input-required">*</span></label>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-3 col-form-label"> Description <span class="input-required">*</span></label>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-md-9">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="fas fa-plus-circle"></i> Create
                            </button>

                            <button type="reset" class="btn btn-outline-danger">
                                <i class="fas fa-fw fa-undo"> Reset
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div> {{-- /// Content --}}
    </div> {{-- /// END ROW --}}
@endsection