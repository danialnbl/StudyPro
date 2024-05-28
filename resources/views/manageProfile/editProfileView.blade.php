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
                    <img class="img-account-profile rounded-circle mb-2 profile-photo" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile Photo">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">{{ Auth::user()->name }}</div>
                    <!-- Profile picture upload button-->
                    <form method="POST" action="{{ route('platProfile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="PI_File">Upload Profile:</label>
                            <input class="form-control mb-3" type="file" id="PI_File" name="PI_File" accept="image/png,image/jpeg" required>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('platProfile.update') }}">
                        @csrf
                        @method('PUT')
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input type="text" class="form-control" name="P_Name" value="{{ Auth::user()->name }}">
                                </td>
                            </tr>
                            <tr>
                                <th>NR IC</th>
                                <td>{{$platinum->P_IC }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td>
                                    <input type="text" class="form-control" name="P_PhoneNumber" value="{{$platinum->P_PhoneNumber}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Facebook</th>
                                <td>
                                    <input type="text" class="form-control" name="P_Facebook" value="{{$platinum->P_Facebook}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <input type="text" class="form-control" name="P_Address" value="{{$platinum->P_Address}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>
                                    <input type="text" class="form-control" name="P_Title" value="{{$platinum->P_Title}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Education Institute</th>
                                <td>
                                    <input type="text" class="form-control" name="PE_EduInstitute" value="{{ $PlatEdu->PE_EduInstitute }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Education Level</th>
                                <td>
                                    <input type="text" class="form-control" name="PE_EduLevel" value="{{$PlatEdu->PE_EduLevel}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Sponsorship</th>
                                <td>
                                    <input type="text" class="form-control" name="PE_Sponsorship" value="{{ $PlatEdu->PE_Sponsorship }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Occupation</th>
                                <td>
                                    <input type="text" class="form-control" name="PE_Occupation" value="{{$PlatEdu->PE_Occupation}}">
                                </td>
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
