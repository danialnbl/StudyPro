@extends('layouts.main')

@section('container')
    <section class="vh-100 gradient-custom">
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get("success") }}
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert alert-danger">
                {{ session()->get("error") }}
            </div>
        @endif
        <div class="card " style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                @foreach ($Experts as $expert)
                <form  id="upload" action="/expertEdit/{{ $expert->E_ID }}" method="post" enctype="multipart/form-data" class="expert-form row">
                    @csrf
                    @method('PUT')
                    <div class="form-section">
                        <h3 class=" pb-2 pb-md-0"><b>Edit Expert</b></h3>
                        <div class="col-12">
                            <label for="E_Name" class="form-label">Expert Name</label>
                            <input type="text" class="form-control mb-3" id="E_Name" name="E_Name" value="{{$expert->E_Name}}" required>
                        </div>
                        <div class="col-12">
                            <label for="E_University" class="form-label">Expert University</label>
                            <input type="text" class="form-control mb-3" id="E_University" name="E_University"
                                   value="{{$expert->E_University}}" required>
                        </div>
                        <div class="col-12">
                            <label for="E_Email" class="form-label">Expert Email</label>
                            <input type="email" class="form-control mb-3" id="E_Email" name="E_Email" value="{{$expert->E_Email}}" required>
                        </div>
                        <div class="col-12">
                            <label for="E_PhoneNumber" class="form-label">Expert Phone Number</label>
                            <input type="text" class="form-control mb-3" id="E_PhoneNumber" name="E_PhoneNumber" value="{{$expert->E_PhoneNumber}}" required>
                        </div>
                        <div class="col-12">
                            <label for="ER_Title">Research Domain:</label>
                            <select class="form-select" aria-label="Default select example" id="ER_Title" name="ER_Title"
                                    required>
                                <option selected>Open this select menu</option>
                                <option value="Computer System Research Group">Computer System Research Group</option>
                                <option value="Virtual Simulation & Computing">Virtual Simulation & Computing
                                </option>
                                <option value="Machine Intelligence Research Group">Machine Intelligence Research Group</option>
                                <option value="Cyber Security Interest Group">Cyber Security Interest Group
                                </option>
                                <option value="Software Engineering">Software Engineering
                                </option>
                                <option value="Knowledge Engineering & Computational Linguistic">Knowledge Engineering & Computational Linguistic</option>
                                <option value="Data Science & Simulation Modeling">Data Science & Simulation Modeling
                                </option>
                                <option value="Database Technology & Information System">Database Technology & Information System
                                </option>
                                <option value="Educational Technology (EduTech)">Educational Technology (EduTech)
                                </option>
                                <option value="Image Signal Processing">Image Signal Processing
                                </option>
                                <option value="Computer Network & Research Group">Computer Network & Research Group
                                </option>
                                <option value="Soft Computing & Optimization">Soft Computing & Optimization
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-navigation mt-3">
                        <button type="button" class="previous btn btn-primary float-left">Previous</button>
                        <button type="button" class="next btn btn-primary float-right">Next </button>
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </section>
@endsection
