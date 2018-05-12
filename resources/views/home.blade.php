@extends('layouts.app')

@section('content')
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">
            Active domains - <a href="">view all domains</a>
        </h6>

        <div class="pt-2 border-bottom">
            <table class="table-hover table-borderless table-border-margin table table-sm">
                <thead>
                <tr>
                    <th class="no-border" scope="col">Name</th>
                    <th class="no-border" scope="col">DPO</th>
                    <th class="no-border" scope="col">Concerns</th>
                    <th class="no-border" scope="col" colspan="2">Registered at</th> {{-- Colspan 2 needed for the functions --}}
                </tr>
                </thead>
                <tbody>
                    @if (count($domains) > 0) {{-- There are domains registered in the application --}}
                        @foreach ($domains as $domain) {{-- Loop through the domains --}}
                            <tr>
                                <td><a target="_blank" href="{{ $domain->url }}">{{ $domain->name }}</a></td>
                                <td>{{ $domain->dpo->name }}</td>
                                <td>
                                    <span class="badge badge-danger">32 open</span>
                                    <span class="badge badge-success">27 closed</span>
                                </td>
                                <td><span class="text-muted">{{ $domain->created_at->diffForHumans() }}</span></td>
                                <td>
                                    <a href="#"><i class="far fa-eye"></i> View</a>
                                </td>
                            </tr>
                        @endforeach {{-- /// END loop --}}
                    @else {{-- No domain registered in the application --}}
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent privacy concerns</h6>
        <div class="media text-muted pt-3">
            <div style="font-size:1.75em; text-align: center; width: 35px; height:35px;" class="mr-2 rounded">
                <i class="far fa-file-alt"></i>
            </div>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#"><i class="far fa-eye"></i> View</a>
                </div>
                <span class="mt-1 d-block">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</span>
            </div>
        </div>
        <small class="d-block text-right mt-3">
            <a href="">View all concerns</a> -
            <a href="">Create concern</a>
        </small>
    </div>
@endsection
