@extends('layouts.main')

@section('container')
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{ session()->get("success") }}
        </div>
    @endif
    @if(session()->has("fail"))
        <div class="alert alert-danger">
            {{ session()->get("fail") }}
        </div>
    @endif
    <h1>All Experts List</h1>
    <div class="card p-4 mt-4">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">University</th>
                    <th scope="col">Email</th>
                    <th scope="col">PhoneNumber</th>
                    <th class="text-center" scope="col">Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expert as $expert)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $expert->E_Name }}</td>
                        <td>{{ $expert->E_University }}</td>
                        <td>{{ $expert->E_Email }}</td>
                        <td>{{ $expert->E_PhoneNumber }}</td>
                        <td class="text-center">
                            <a class="opn btn btn-primary" href="/expertDetail/{{$expert->E_ID}}">
                                <i class="bi bi-eye"></i>
                                Show Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/expertReport" class="btn btn-primary align-items-end">
            Download All Experts
        </a>
    </div>
@endsection
