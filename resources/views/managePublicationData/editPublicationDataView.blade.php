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
                <form id="upload" action="/Editpublication/{{ $publication->PD_ID }}" method="post" enctype="multipart/form-data" class="publication-form row">
                    @csrf
                    @method('PUT')
                    <div class="form-section">
                        <h3 class="pb-2 pb-md-0"><b>Edit Your Publication</b></h3>
                        <div class="col-12">
                            <label for="PD_University" class="form-label">University Name</label>
                            <input type="text" class="form-control mb-3" id="PD_University" name="PD_University" value="{{ $publication->PD_University }}" required>
                        </div>
                        <div class="col-12">
                            <label for="PD_Title" class="form-label">Publication Title</label>
                            <input type="text" class="form-control mb-3" id="PD_Title" name="PD_Title" value="{{ $publication->PD_Title }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="PD_Author" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="PD_Author" name="PD_Author" value="{{ $publication->PD_Author }}" required>
                        </div>
                        <div class="col-12">
                            <label for="PD_DOI" class="form-label">DOI</label>
                            <input type="text" class="form-control mb-3" id="PD_DOI" name="PD_DOI" value="{{ $publication->PD_DOI }}" required>
                        </div>
                        <div class="col-12">
                            <label for="PD_Type" class="form-label">Publication Type</label>
                            <select class="form-select mb-3" id="PD_Type" name="PD_Type" required>
                                <option>Select Publication Type</option>
                                <option value="Journal" {{ $publication->PD_Type == 'Journal' ? 'selected' : '' }}>Journal</option>
                                <option value="Article" {{ $publication->PD_Type == 'Article' ? 'selected' : '' }}>Article</option>
                                <option value="Conference Paper" {{ $publication->PD_Type == 'Conference Paper' ? 'selected' : '' }}>Conference Paper</option>
                                <option value="Book" {{ $publication->PD_Type == 'Book' ? 'selected' : '' }}>Book</option>
                                <option value="Presentation" {{ $publication->PD_Type == 'Presentation' ? 'selected' : '' }}>Presentation</option>
                                <option value="Chapter" {{ $publication->PD_Type == 'Chapter' ? 'selected' : '' }}>Chapter</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="PD_File" class="form-label">Upload Your New File (optional)</label>
                            <input class="form-control mb-3" type="file" id="PD_File" name="PD_File" accept="application/pdf">
                            @error('file')
                            @enderror
                        </div>
                        <div class="col-12">
                            <label>Current File:</label>
                            <a href="{{ Storage::url($publication->PD_FilePath) }}" target="_blank">{{ $publication->PD_FileName }}</a>
                        </div>
                    </div>
                    <div class="form-navigation mt-3">
                        <button type="button" class="previous btn btn-primary float-left">Previous</button>
                        <button type="button" class="next btn btn-primary float-right">Next</button>
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
