@extends('layouts.staffmain')

@section('staff')
<section>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-10 col-lg-8 mx-auto">
        <div class="card mb-5">
          <div class="card-body">
            <h5 class="mb-4">Edit Platinum Registration</h5>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('platEdit.update', $Platinum->P_IC) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row mb-3">
                <label for="P_PhoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="P_PhoneNumber" id="P_PhoneNumber" value="{{ old('P_PhoneNumber', $Platinum->P_PhoneNumber) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="P_Facebook" class="col-sm-4 col-form-label">Facebook</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="P_Facebook" id="P_Facebook" value="{{ old('P_Facebook', $Platinum->P_Facebook) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="P_TshirtSize" class="col-sm-4 col-form-label">T-shirt Size</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="P_TshirtSize" id="P_TshirtSize" value="{{ old('P_TshirtSize', $Platinum->P_TshirtSize) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="P_Program" class="col-sm-4 col-form-label">Program</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="P_Program" id="P_Program" value="{{ old('P_Program', $Platinum->P_Program) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="P_Batch" class="col-sm-4 col-form-label">Batch</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" name="P_Batch" id="P_Batch" value="{{ old('P_Batch', $Platinum->P_Batch) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="P_Status" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <select class="form-select" name="P_Status" id="P_Status" required>
                    <option value="" disabled>Select Status</option>
                    <option value="Platinum" {{ old('P_Status', $Platinum->P_Status) == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                    <option value="CRMP" {{ old('P_Status', $Platinum->P_Status) == 'CRMP' ? 'selected' : '' }}>CRMP</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="P_Title" class="col-sm-4 col-form-label">Title</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="P_Title" id="P_Title" value="{{ old('P_Title', $Platinum->P_Title) }}" required>
                </div>
              </div>

              @if($PlatEdu)
              <div class="form-group row mb-3">
                <label for="PE_EduInstitute" class="col-sm-4 col-form-label">Education Institute</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="PE_EduInstitute" id="PE_EduInstitute" value="{{ old('PE_EduInstitute', $PlatEdu->PE_EduInstitute) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="PE_Sponsorship" class="col-sm-4 col-form-label">Sponsorship</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="PE_Sponsorship" id="PE_Sponsorship" value="{{ old('PE_Sponsorship', $PlatEdu->PE_Sponsorship) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="PE_ProgramFee" class="col-sm-4 col-form-label">Program Fee</label>
                <div class="col-sm-8">
                  <input type="number" step="0.01" class="form-control" name="PE_ProgramFee" id="PE_ProgramFee" value="{{ old('PE_ProgramFee', $PlatEdu->PE_ProgramFee) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="PE_EduLevel" class="col-sm-4 col-form-label">Education Level</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="PE_EduLevel" id="PE_EduLevel" value="{{ old('PE_EduLevel', $PlatEdu->PE_EduLevel) }}" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="PE_Occupation" class="col-sm-4 col-form-label">Occupation</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="PE_Occupation" id="PE_Occupation" value="{{ old('PE_Occupation', $PlatEdu->PE_Occupation) }}" required>
                </div>
              </div>
              @endif

              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

