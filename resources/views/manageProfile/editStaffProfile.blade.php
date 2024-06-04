@extends('layouts.staffmain')

@section('staff')
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

    .profile-photo {
        max-width: 200px;
        height: auto;
    }
</style>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2 profile-photo" src="" alt="Profile Photo">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('staff.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="PI_File">Upload Profile:</label>
                            <input class="form-control" type="file" id="PI_File" name="PI_File" accept="image/png,image/jpeg">
                        </div>

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input type="text" class="form-control" name="S_Name" value="{{ Auth::user()->name }}">
                                </td>
                            </tr>
                            <tr>
                                <th>NR IC</th>
                                <td>{{$staff->S_IC }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td>
                                    <input type="text" class="form-control" name="S_PhoneNumber" value="{{$staff->S_PhoneNumber}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Staff ID</td>
                                <td>{{ $staff->S_StaffID }}</td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection