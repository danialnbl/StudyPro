@extends('layouts.staffmain')

@section('staff')
<style>
  body {
      margin-top: 20px;
      background-color: #f2f6fc;
      color: #69707a;
  }
  .img-account-profile {
      width: 150px; /* Fixed width */
      height: 150px; /* Fixed height */
      object-fit: cover; /* Ensure the image covers the area without distortion */
  }
  .rounded-circle {
      border-radius: 50% !important;
  }
  .card {
      box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
  }
  .card .card-header {
      font-weight: 500;
  }
  .card-header:first-child {
      border-radius: 0.35rem 0.35rem 0 0;
  }
  .card-header {
      padding: 1rem 1.35rem;
      margin-bottom: 0;
      background-color: rgba(33, 40, 50, 0.03);
      border-bottom: 1px solid rgba(33, 40, 50, 0.125);
  }
  .form-control, .dataTable-input {
      display: block;
      width: 100%;
      padding: 0.875rem 1.125rem;
      font-size: 0.875rem;
      font-weight: 400;
      line-height: 1;
      color: #69707a;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #c5ccd6;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 0.35rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  .nav-borders .nav-link.active {
      color: #0061f2;
      border-bottom-color: #0061f2;
  }
  .nav-borders .nav-link {
      color: #69707a;
      border-bottom-width: 0.125rem;
      border-bottom-style: solid;
      border-bottom-color: transparent;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      padding-left: 0;
      padding-right: 0;
      margin-left: 1rem;
      margin-right: 1rem;
  }
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
</style>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2 profile-photo" src="@if($fetchPic != '')
                                {{ url('storage/'.$fetchPic->PI_FilePath)  }}
                                @else
                                {{ url('assets/defaultPP.png') }}
                            @endif " alt="Profile Photo">
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
                                {{$staff->S_Name }}
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