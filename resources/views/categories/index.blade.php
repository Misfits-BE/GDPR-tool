@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-3"> {{-- Sidebar --}}
            @include ('categories.partials.navigation')
        </div> {{-- /// END Sidebar --}}

        <div class="col-9"> {{-- Content --}}
            <div class="card card-body border-0 box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-3">Application categories overview</h6>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="no-border">Name:</th>
                            <th class="no-border">Module:</th>
                            <th colspan="2" class="no-border">Description:</th> {{-- Colspan="2" needed for the functions --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) > 0) {{-- There are categories are found in the application --}}
                            @foreach ($categories as $category) {{-- Category loop --}}
                                <tr>
                                    <td>{{ ucfirst($category->name) }}</td>
                                    <td><span class="badge badge-primary">{{ ucfirst($category->module) }}</span></td>
                                    <td>{{ ucfirst($category->description) }}</td>
                                    
                                    <td> {{-- Options --}}
                                        <a href="" class="text-danger text-right">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    </td> {{-- /// End options --}}
                                </tr>
                            @endforeach {{-- /// END category loop --}}
                        @else {{-- No categories are found in the application --}}
                        @endif
                    </tbody>
                </table>
            </div>
        </div> {{-- /// END Content --}}
    </div>
@endsection