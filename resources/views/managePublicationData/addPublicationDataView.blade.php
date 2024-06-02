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
                        <h3 class=" pb-2 pb-md-0"><b>Add New Publication</b></h3>
                        <div class="col-12">
                            <label for="E_Name" class="form-label">University Name</label>
                            <input type="text" class="form-control mb-3" id="E_Name" name="E_Name" required>
                        </div>
                        <div class="col-12">
                            <label for="E_University" class="form-label">Publication Title</label>
                            <input type="text" class="form-control mb-3" id="E_University" name="E_University"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="E_Email" class="form-label">Author Name</label>
                            <input type="email" class="form-control mb-3" id="E_Email" name="E_Email" required>
                        </div>
                        <div class="col-12">
                            <label for="E_PhoneNumber" class="form-label">DOI: </label>
                            <input type="text" class="form-control mb-3" id="E_PhoneNumber" name="E_PhoneNumber" required>
                        </div>
                        <div class="col-12">
                            <label for="ER_Title">Publication Type:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="ER_Title" name="ER_Title"
                                required>
                                <option selected>Select Publication Type</option>
                                <option value="Journal">Journal</option>
                                <option value="Article">Article</option>
                                <option value="Conference Paper">Conference Paper</option>
                                <option value="Book">Book</option>
                                <option value="Presentation">Presentation</option>
                                <option value="Chapter">Chapter</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="PI_File">Upload Your File</label>
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
                            <label for="EP_Paper">Research Paper Title:</label>
                            <input type="text" class="form-control mb-3" id="EP_Paper" name="EP_Paper" required>
                        </div>
                        <div class="col-12">
                            <label for="EP_Year" class="col-sm-2 col-form-label">Date Apply</label>
                            <input type="date" class="form-control mb-3" name="EP_Year" id="EP_Year">
                        </div>
                        <div class="col-12">
                            <label for="RP_File">Upload Research Paper:</label>
                            <input class="form-control mb-2" type="file" id="RP_File" name="RP_File" accept="application/pdf" required>
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
