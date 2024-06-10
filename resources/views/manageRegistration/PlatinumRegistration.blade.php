@extends('layouts.staffmain')

@section('staff')
    <main class="container">
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
       <!-- START FORM -->
       <form action="{{ route('register.submit') }}" method='post'>
            @csrf
            <div class="my-3 p-5 bg-body rounded shadow-sm">
                <h1>Platinum Registration</h1>
                <h2>Platinum details:</h2>
                <!-- Form Fields Here -->
                <div class="mb-3 row">
                    <label for="P_Name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='P_Name' id="P_Name" value="{{ old('P_Name') }}" autofocus>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="P_IC" class="col-sm-2 col-form-label">NR IC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='P_IC' id="P_IC" value="{{ old('P_IC') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="P_Gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                        <input type="radio" name="P_Gender" value="male" {{ old('P_Gender') == 'male' ? 'checked' : '' }}> Male
                        <input type="radio" name="P_Gender" value="female" {{ old('P_Gender') == 'female' ? 'checked' : '' }}> Female
                    </div>
                </div>
            <div class="mb-3 row">
                <label for="P_Religion" class="col-sm-2 col-form-label">Religion</label>
                <div class="col-sm-10">
                <input type="radio" name="P_Religion" value="islam"> Islam
                <input type="radio" name="P_Religion" value="christian"> Christian
                <input type="radio" name="P_Religion" value="buddha"> Buddha
                </div>
            </div>
            <div class="mb-3 row">
            <label for="P_Race" class="col-sm-2 col-form-label">Race</label>
            <div class="col-sm-10">
                <input type="radio" name="P_Race" value="malay"> Malay
                <input type="radio" name="P_Race" value="indian"> Indian
                <input type="radio" name="P_Race" value="chinese"> Chinese
                <input type="radio" name="P_Race" value="others" id="race_others"> Others
                <input type="text" name="race_others_textbox" id="race_others_textbox" style="display:none;">
            </div>
        </div>

        <script>
            document.getElementById('race_others').addEventListener('change', function() {
                var othersInput = document.getElementById('race_others_textbox');
                if (this.checked) {
                    othersInput.style.display = 'block';
                } else {
                    othersInput.style.display = 'none';
                }
            });
        </script>

            <div class="mb-3 row">
                <label for="P_Citizenship" class="col-sm-2 col-form-label">Citizenship</label>
                <div class="col-sm-10">
                <input type="radio" name="P_Citizenship" value="malaysian"> Malaysian
                <input type="radio" name="P_Citizenship" value="nonMalay"> Non-Malaysian
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_Address" id="P_Address">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_City" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_City" id="P_City">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_State" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_State" id="P_State">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Country" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_Country" id="P_Country">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Zip" class="col-sm-2 col-form-label">Zip Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_Zip" id="P_Zip">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_PhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_PhoneNumber" id="P_PhoneNumber">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="P_Email" id="P_Email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Facebook" class="col-sm-2 col-form-label">Facebook</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_Facebook" id="P_Facebook">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_TshirtSize" class="col-sm-2 col-form-label">T-Shirt Size</label>
                <div class="col-sm-10">
                <input type="radio" name="P_TshirtSize" value="xs"> XS
                <input type="radio" name="P_TshirtSize" value="s"> S
                <input type="radio" name="P_TshirtSize" value="m"> M
                <input type="radio" name="P_TshirtSize" value="l"> L
                <input type="radio" name="P_TshirtSize" value="xl"> XL
                <input type="radio" name="P_TshirtSize" value="xxl"> XXL
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_DateApply" class="col-sm-2 col-form-label">Date Apply</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="P_DateApply" id="P_DateApply">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Program" class="col-sm-2 col-form-label">Program</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_Program" id="P_Program">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Batch" class="col-sm-2 col-form-label">Batch</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="P_Batch" id="P_Batch">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="P_Status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-select" name="P_Status" id="P_Status">
                    <option value="" selected disabled>Select Status</option>
                    <option value="Platinum">Platinum</option>
                    <option value="CRMP">CRMP</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="P_Title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="P_Title" id="P_Title">
                </div>
            </div>
            <!-- Referral -->
            <h2>Platinum Referrals:</h2>
                <div class="mb-3 row">
                    <label for="referral" class="col-sm-2 col-form-label">Do you have referrals?</label>
                    <div class="col-sm-10">
                        <input type="radio" name="referral" value="yes" id="referralYes" {{ old('referral') == 'yes' ? 'checked' : '' }}> Yes
                        <input type="radio" name="referral" value="no" id="referralNo" {{ old('referral') == 'no' ? 'checked' : '' }}> No
                    </div>
                </div>
                <div class="mb-3 row referral-info" id="referralInfoName" style="display:none;">
                    <label for="PR_Name" class="col-sm-2 col-form-label">Referral Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="PR_Name" name="PR_Name" value="{{ old('PR_Name') }}">
                    </div>
                </div>
                <div class="mb-3 row referral-info" id="referralInfoBatch" style="display:none;">
                    <label for="PR_Batch" class="col-sm-2 col-form-label">Referral Batch</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="PR_Batch" name="PR_Batch" value="{{ old('PR_Batch') }}">
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const referralYes = document.getElementById('referralYes');
                        const referralNo = document.getElementById('referralNo');
                        const referralInfo = document.querySelectorAll('.referral-info');

                        function toggleReferralFields() {
                            if (referralYes.checked) {
                                referralInfo.forEach(field => field.style.display = 'block');
                            } else {
                                referralInfo.forEach(field => field.style.display = 'none');
                            }
                        }

                        referralYes.addEventListener('change', toggleReferralFields);
                        referralNo.addEventListener('change', toggleReferralFields);

                        // Initialize the state on load
                        toggleReferralFields();
                    });
                </script>

            <h2>Education details: </h2>
            <div class="mb-3 row">
                <label for="PE_EduInstitute" class="col-sm-2 col-form-label">Education Institute</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="PE_EduInstitute" id="PE_EduInstitute">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="PE_Sponsorship" class="col-sm-2 col-form-label">Sponsorship</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="PE_Sponsorship" id="PE_Sponsorship">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="PE_ProgramFee" class="col-sm-2 col-form-label">Program Fee</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="PE_ProgramFee" id="PE_ProgramFee">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="PE_EduLevel" class="col-sm-2 col-form-label">Education Level</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="PE_EduLevel" id="PE_EduLevel">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="PE_Occupation" class="col-sm-2 col-form-label">Occupation</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="PE_Occupation" id="PE_Occupation">
                </div>
            </div>
            <!--button-->
            <div class="row mb-3">
                    <button type="submit" class="btn btn-primary col-sm-2">Register User</button>
                </div>
            </div>
        </form>
        </div>
        <!-- AKHIR FORM -->

    </main>
    
    @endsection
