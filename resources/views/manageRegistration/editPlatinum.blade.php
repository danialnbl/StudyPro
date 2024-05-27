@extends('layouts.main')

@section('container')
<section style="">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="mb-4">Edit Platinum Registration</h5>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/platEdit/ {{$Platinum->P_IC}}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3 row">
                <label for="P_PhoneNumber" class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="P_PhoneNumber" id="P_PhoneNumber" value="{{ $Platinum->P_PhoneNumber }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="P_Facebook" class="col-sm-3 col-form-label">Facebook</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="P_Facebook" id="P_Facebook" value="{{ $Platinum->P_Facebook }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="P_TshirtSize" class="col-sm-3 col-form-label">T-shirt Size</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="P_TshirtSize" id="P_TshirtSize" value="{{ $Platinum->P_TshirtSize }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="P_Program" class="col-sm-3 col-form-label">Program</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="P_Program" id="P_Program" value="{{ $Platinum->P_Program }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="P_Batch" class="col-sm-3 col-form-label">Batch</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="P_Batch" id="P_Batch" value="{{ $Platinum->P_Batch }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="P_Status" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                  <select class="form-select" name="P_Status" id="P_Status" required>
                    <option value="" disabled>Select Status</option>
                    <option value="Platinum" {{ $Platinum->P_Status == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                    <option value="CRMP" {{ $Platinum->P_Status == 'CRMP' ? 'selected' : '' }}>CRMPe</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="P_Title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="P_Title" id="P_Title" value="{{ $Platinum->P_Title }}" required>
                </div>
              </div>

              @if($PlatEdu)
              <div class="mb-3 row">
                <label for="PE_EduInstitute" class="col-sm-3 col-form-label">Education Institute</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="PE_EduInstitute" id="PE_EduInstitute" value="{{ $PlatEdu->PE_EduInstitute }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="PE_Sponsorship" class="col-sm-3 col-form-label">Sponsorship</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="PE_Sponsorship" id="PE_Sponsorship" value="{{ $PlatEdu->PE_Sponsorship }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="PE_ProgramFee" class="col-sm-3 col-form-label">Program Fee</label>
                <div class="col-sm-9">
                  <input type="number" step="0.01" class="form-control" name="PE_ProgramFee" id="PE_ProgramFee" value="{{ $PlatEdu->PE_ProgramFee }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="PE_EduLevel" class="col-sm-3 col-form-label">Education Level</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="PE_EduLevel" id="PE_EduLevel" value="{{ $PlatEdu->PE_EduLevel }}" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="PE_Occupation" class="col-sm-3 col-form-label">Occupation</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="PE_Occupation" id="PE_Occupation" value="{{ $PlatEdu->PE_Occupation }}" required>
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
