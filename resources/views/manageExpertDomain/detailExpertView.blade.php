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
                            <img src="@if($fetchPic != '')
                                {{ url('storage/'.$fetchPic->PI_FilePath)  }}
                                @else
                                {{ url('assets/defaultPP.png') }}
                            @endif " alt="Profile" class="rounded-circle">
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
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Expert Research Paper</button>
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
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Expert Domain</div>
                                        <div class="col-lg-9 col-md-8">{{ $Expert->E_Domain }}</div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                        <div class="row mb-3">
                                            @if($Expert -> P_IC == Auth::user()->P_IC)
                                                <div class="d-flex flex-row-reverse mb-3">
                                                    <button type="button" class="btn btn-primary align-items-end" data-bs-toggle="modal" data-bs-target="#addPaperModal">
                                                        Add new paper
                                                    </button>
                                                </div>
                                                <!-- Modal -->
                                            <form id="upload" action="/paperAdd/{{$Expert->E_ID}}" method="post" enctype="multipart/form-data" class="row">
                                                @csrf
                                                <div id="addPaperModal" class="modal " tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Add new paper</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3 class=" pb-2 pb-md-0"><b>Expert Research</b></h3>
                                                                <div class="col-12">
                                                                    <label for="PD_Title">Publication Title:</label>
                                                                    <input type="text" class="form-control mb-3" id="PD_Title" name="PD_Title" required>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="PD_Date" class=" col-form-label">Publication Date</label>
                                                                    <input type="date" class="form-control mb-3" name="PD_Date" id="PD_Date">
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="PD_Type">Publication Type:</label>
                                                                    <select class="form-select mb-3" aria-label="Default select example" id="PD_Type" name="PD_Type"
                                                                            required>
                                                                        <option selected>Open this select menu</option>
                                                                        <option value="Journal">Journal</option>
                                                                        <option value="Article">Article
                                                                        </option>
                                                                        <option value="Book">Book</option>
                                                                        <option value="Conference Paper">Conference Paper</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="PD_File">Upload Publication:</label>
                                                                    <input class="form-control mb-2" type="file" id="PD_File" name="PD_File" accept="application/pdf" required>
                                                                    @error('file')
                                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @endif

                                                <table  class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Year</th>
                                                        <th scope="col">Paper</th>
                                                        @if($Expert -> P_IC == Auth::user()->P_IC)
                                                            <th class="text-center" scope="col">Edit</th>
                                                            <th class="text-center" scope="col">Delete</th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($Experts as $expert)
                                                        @foreach($fetchPublication as $publication)
                                                            <tr>
                                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                                <td>{{ date('Y',strtotime($publication->PD_Date))  }}</td>
                                                                <td>
                                                                    <a href="{{ url('storage/'.$publication->PD_FilePath)  }}">{{ $publication -> PD_Title }}</a>
                                                                </td>
                                                                @if($Expert -> P_IC == Auth::user()->P_IC)
                                                                    <td class="text-center">
                                                                        <a class="opn btn btn-success"
                                                                           href="">
                                                                            <i class="bi bi-pencil-square"></i>
                                                                            Edit
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a class="del btn btn-danger" href="/paperDelete/{{$publication->PD_ID}}"><i class="bi bi-trash-fill"></i>
                                                                            Delete</a>
                                                                    </td>
                                                                @endif
                                                            </tr>
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
