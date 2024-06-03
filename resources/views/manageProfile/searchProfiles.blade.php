@extends('layouts.main')
@section('container')
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: 500;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .search-form {
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <h1>Search User Profiles</h1>

    <form action="{{ route('profiles.search') }}" method="GET" class="search-form">
        <div class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Search by name or email" value="{{ old('query', $query ?? '') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    @if(isset($users))
        @if($users->isEmpty())
            <p>No users found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('profile.show', $user->id) }}">View Profile</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
@endsection
