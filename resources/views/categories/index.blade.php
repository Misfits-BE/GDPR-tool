@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-3"> {{-- Sidebar --}}
            @include ('categories.partials.navigation')
        </div> {{-- /// END Sidebar --}}

        <div class="col-9"> {{-- Content --}}
            <div class="card card-body border-0 box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-3">Privacy categories overview</h6>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="no-border">Name:</th>
                            <th class="no-border">Description:</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div> {{-- /// END Content --}}
    </div>
@endsection