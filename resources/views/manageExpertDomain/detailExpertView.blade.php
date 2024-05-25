@extends('layouts.main')

@section('container')
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/platinumdashboard">Home</a></li>
                    <li class="breadcrumb-item">Experts</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @foreach($Experts as $Expert)
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ url('assets/testPic.jpg') }}" alt="Profile" class="rounded-circle">
                            <h2>{{$Expert->E_Name}}</h2>
                            <h3>{{$Expert->E_University}}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Expert Research</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{$Expert->E_Name}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">University</div>
                                        <div class="col-lg-9 col-md-8">{{$Expert->E_University}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{$Expert->E_Email}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">{{$Expert->E_PhoneNumber}}</div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                        <div class="row mb-3">
                                            <table id="" class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Year</th>
                                                    <th scope="col">Paper</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($Experts as $expert)
                                                    @foreach($fetchResearches as $research)
                                                        @foreach($fetchPapers as $paper)
                                                        <tr>
                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                            <td>{{ $research->ER_Title }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($paper->EP_Year))  }}</td>
                                                            <td>
                                                                <a href="{{ url('storage/'.$paper->EP_FilePath)  }}">{{ $paper -> EP_Paper }}</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                </div>

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        @endforeach
@endsection
