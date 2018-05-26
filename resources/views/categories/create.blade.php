@extends('layouts.app')

@section('content')
    <div class="row my-3"> {{-- Sidebar --}}
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
                    </div>
                </form>

            </div>
        </div> {{-- /// Content --}}
    </div> {{-- /// END sidebar --}}
@endsection