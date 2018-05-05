@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-3">
            @include ('users.partials.navigation')
        </div>

        <div class="col-9">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th colspan="2">Registered at</th> {{-- Colspan 2 needed for the functions --}}
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($users) > 0) {{-- There are users found --}}
                            <tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="" class="text-danger text-right">
                                                <i class="fas fa-times-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tr>
                        @else {{-- No users are found --}}
                            <tr>
                                <td colspan="5">
                                    <small class="text-muted">There are no users found with the term. {{ $term }}}</small>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                    {{ $users->links() }} {{-- Pagination view instance --}}
                </div>
            </div>
        </div>
    </div>
@endsection