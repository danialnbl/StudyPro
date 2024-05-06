@extends('layouts.main')

@section('container')
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
                    <th class="text-center" scope="col">Actions</th>
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
                            <div class="dropdown">
                                <button type="button" class="btn p-0" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item opn" data-bs-toggle="modal" data-bs-target="#edit-log"
                                        href="javascript:void(0);">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item del" href="javascript:void(0);"><i class="bi bi-trash-fill"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
