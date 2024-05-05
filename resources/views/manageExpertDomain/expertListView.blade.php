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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>
                        <button type="button" class="btn btn-primary">:</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                    <td>
                        <button type="button" class="btn btn-primary">Edit</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Thornton</td>
                    <td>@twitter</td>
                    <td>Otto</td>
                    <td>
                        <button type="button" class="btn btn-primary">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
