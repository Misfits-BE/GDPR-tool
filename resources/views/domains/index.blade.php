@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-3">
            @include ('domains.partials.navigation')
        </div>

        <div class="col-9"> {{-- Content --}}
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">Domains overview</h6>

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="no-border" scope="col">Name</th>
                                <th class="no-border" scope="col">DPO</th>
                                <th class="no-border" scope="col"></th>
                                <th colspan="2" class="no-border" scope="col">Registered at</th> {{-- Colspan 2 needed for the functions --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($domains) > 0) {{-- There are domains found --}}
                                @foreach ($domains as $domain) {{-- Loop through the domains --}}
                                    <tr>
                                        <td><a href="{{ $domain->url }}">{{ $domain->name }}</a></td>
                                        <td>{{ ucfirst($domain->dpo->name) }}</td>

                                        <td> {{-- Concerns --}}
                                            <a href="" class="badge badge-success">
                                                {{ $domain->concerns()->open()->count() }} Open
                                            </a>

                                            <a href="" class="badge badge-danger">
                                                {{ $domain->concerns()->closed()->count() }} Closed
                                            </a>
                                        </td> {{-- /// Concerns --}}

                                        <td><span class="text-muted">{{ $domain->created_at->diffForHumans() }}</span></td>

                                        <td>
                                            <span class="float-right">
                                                <a href="" class="text-danger">
                                                    <i class="fas fa-fw fa-times-circle"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach {{-- END domain loop --}}
                            @else {{-- There are no domains found --}}
                                <tr>
                                    <td colspan="4">
                                        @if (! is_null($term)) {{-- There is a search term given --}}
                                            <span class="text-muted">
                                                <i>(There are no domains found with the term '{{ $term }}')</i>
                                            </span>
                                        @else {{-- There is no search term given --}}
                                            <span class="text-muted"><i>(There are no domains registered in the GDPR tool)</i></span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    {{ $domains->links() }}
                </div>
            </div>
        </div> {{-- // End content  --}}
    </div>
@endsection