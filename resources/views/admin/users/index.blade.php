@extends('layouts.admin.app')

@section('title')
    {{ 'All Users | Real Estate Nepal' }}
@endsection

@section('contents')
    <div class="card m-auto">
        <div class="card-body">
            <h1 class="card-title">Users</h1>
            <h6 class="card-subtitle mb-2 text-muted">View all users available in the system</h6>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="column">ID</th>
                        <th scope="column">First Name</th>
                        <th scope="column">Middle Name</th>
                        <th scope="column">Last Name</th>
                        <th scope="column">Email</th>
                        <th scope="column">Phone Number</th>
                        <th scope="column"></th>
                        <th scope="column"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->id ?? '-' }}</td>
                            <td>{{ $user->first_name ?? '-' }}</td>
                            <td>{{ $user->middle_name ?? '-' }}</td>
                            <td>{{ $user->last_name ?? '-' }}</td>
                            <td>
                                @if ($user->id == '1')
                                    @if (auth()->user()->id == '1')
                                        {{ $user->email ?? '-' }}
                                    @else
                                        {{ 'XXXXXXXXXXXXXXX' }}
                                    @endif
                                @else
                                    {{ $user->email ?? '-' }}
                                @endif
                            </td>
                            <td>{{ $user->phone_number ?? '-' }}</td>
                            <td>
                                @if ($user->id != '1')
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if ($user->id != '1')
                                    @if ($user->status->role != 'admin')
                                        <form action="{{ route('admin.user.patch', $user->id) }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-secondary btn-sm">Make Admin</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.user.patch', $user->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-danger btn-sm">Remove Admin</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
