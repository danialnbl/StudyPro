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

                <form  id="upload" action="{{ route('expertAdd.submit') }}" method="post" enctype="multipart/form-data" class="expert-form row">
                    @csrf
                    <div class="form-section">
                        <h3 class=" pb-2 pb-md-0"><b>Add New Expert</b></h3>
                        <div class="col-12">
                            <label for="E_Name" class="form-label">Expert Name</label>
                            <input type="text" class="form-control mb-3" id="E_Name" name="E_Name" required>
                        </div>
                        <div class="col-12">
                            <label for="E_University" class="form-label">Expert University</label>
                            <input type="text" class="form-control mb-3" id="E_University" name="E_University"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="E_Email" class="form-label">Expert Email</label>
                            <input type="email" class="form-control mb-3" id="E_Email" name="E_Email" required>
                        </div>
                        <div class="col-12">
                            <label for="E_PhoneNumber" class="form-label">Expert Phone Number</label>
                            <input type="text" class="form-control mb-3" id="E_PhoneNumber" name="E_PhoneNumber" required>
                        </div>
                        <div class="col-12">
                            <label for="E_Domain">Research Domain:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="E_Domain" name="E_Domain"
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
                        <div class="col-12">
                            <label for="PI_File">Upload Expert Image:</label>
                            <input class="form-control mb-3" type="file" id="PI_File" name="PI_File" accept="image/png,image/jpeg" required>
                            @error('file')
                            <div class="alert alert-danger mt-1 mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                                <img id="imagePreview" src="#" alt="Image" width="200" height="200"/>
                        </div>
                    </div>
                    <div class="form-section add-more" id="add-more">
                        <h3 class=" pb-2 pb-md-0"><b>Expert Research</b></h3>
                        <div class="col-12">
                            <label for="PD_Title">Publication Title:</label>
                            <input type="text" class="form-control mb-3" id="PD_Title" name="PD_Title" required>
                        </div>
                        <div class="col-12">
                            <label for="PD_DOI">Publication DOI:</label>
                            <input type="text" class="form-control mb-3" id="PD_DOI" name="PD_DOI" required>
                        </div>
                        <div class="col-12">
                            <label for="PD_Date" class="col-sm-2 col-form-label">Publication Date</label>
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
{{--                    <div class="form-section">--}}
{{--                        --}}{{-- <label for="">Address:</label> --}}
{{--                        <textarea name="address" class="form-control mb-3" cols="30" rows="5" required></textarea>--}}
{{--                    </div>--}}
                    <div class="form-navigation mt-3">
                        <button type="button" class="previous btn btn-primary float-left">Previous</button>
                        <button type="button" class="next btn btn-primary float-right">Next </button>
{{--                        <button id="addMore" name="addMore" type="button" class="addMore btn btn-primary float-right">--}}
{{--                            Add More Research Paper--}}
{{--                        </button>--}}
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
