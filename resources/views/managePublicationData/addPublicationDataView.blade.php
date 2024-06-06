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
        <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <form id="upload" action="{{ route('publicationAdd.store') }}" method="post" enctype="multipart/form-data" class="publication-form row">
                    @csrf
                    <div class="form-section">
                        <h3 class="pb-2 pb-md-0"><b>Add New Publication</b></h3>
                        <div class="col-12 mb-3">
                            <label for="PD_University" class="form-label">University Name</label>
                            <input type="text" class="form-control" id="PD_University" name="PD_University" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="PD_Title" class="form-label">Publication Title</label>
                            <input type="text" class="form-control" id="PD_Title" name="PD_Title" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="PD_Author" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="PD_Author" name="PD_Author" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="PD_DOI" class="form-label">DOI</label>
                            <input type="text" class="form-control" id="PD_DOI" name="PD_DOI" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="PD_Type" class="form-label">Publication Type</label>
                            <select class="form-select" id="PD_Type" name="PD_Type" required>
                                <option selected disabled>Select Publication Type</option>
                                <option value="Journal">Journal</option>
                                <option value="Article">Article</option>
                                <option value="Conference Paper">Conference Paper</option>
                                <option value="Book">Book</option>
                                <option value="Presentation">Presentation</option>
                                <option value="Chapter">Chapter</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="PD_File" class="form-label">Upload Your File</label>
                            <input class="form-control" type="file" id="PD_File" name="PD_File" accept="application/pdf" required>
                            @error('PD_File')
                                <div class="alert alert-danger mt-1 mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-navigation mt-3">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
