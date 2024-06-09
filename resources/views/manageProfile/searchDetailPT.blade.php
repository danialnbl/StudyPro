@php
    $layout = Auth::user()->LA_Role === 2 ? 'layouts.mentormain' : (Auth::user()->LA_Role === 3 ? 'layouts.CRMPmain' : 'layouts.main');
    $set = Auth::user()->LA_Role === 2 ? 'mentor' : (Auth::user()->LA_Role === 3 ? 'crmp' : 'container');
@endphp

@extends($layout)

@section($set)
<style>
  body {
      margin-top: 20px;
      background-color: #f2f6fc;
      color: #69707a;
  }
  .img-account-profile {
    width: 10rem;
    height: 10rem;
    object-fit: cover;
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
                    <img class="img-account-profile rounded-circle mb-2" src="@if($fetchPic != '')
                                {{ url('storage/'.$fetchPic->PI_FilePath)  }}
                                @else
                                {{ url('assets/defaultPP.png') }}
                            @endif " alt="Profile Photo">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">{{ $platinum->P_Name }}</div>
                    <!-- Profile picture upload button-->
                    <!--<a href="{{route('editPP')}}" class="btn btn-warning btn-sm">Edit Profile</a>-->
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{$platinum->P_Name}}</td>
                        </tr>
                        <tr>
                            <td>NR IC</td>
                            <td>{{ $platinum->P_IC }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $platinum->P_Email }}</td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>{{ $platinum->P_PhoneNumber }}</td>
                        </tr>
                        <tr>
                            <td>Facebook</td>
                            <td>{{ $platinum->P_Facebook }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $platinum->P_Address }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $platinum->P_Title }}</td>
                        </tr>
                        <tr>
                            <td>Education Institute</td>
                            <td>{{ $PlatEdu->PE_EduInstitute }}</td>
                        </tr>
                        <tr>
                            <td>Education Level</td>
                            <td>{{ $PlatEdu->PE_EduLevel }}</td>
                        </tr>
                        <tr>
                            <td>Sponsorship</td>
                            <td>{{ $PlatEdu->PE_Sponsorship}}</td>
                        </tr>
                        <tr>
                            <td>Occupation</td>
                            <td>{{ $PlatEdu->PE_Occupation }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
