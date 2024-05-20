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
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='name' id="name" value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ic" class="col-sm-2 col-form-label">NR IC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='ic' id="ic" value="{{ old('ic') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                        <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> Male
                        <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> Female
                    </div>
                </div>
            <div class="mb-3 row">
                <label for="religion" class="col-sm-2 col-form-label">Religion</label>
                <div class="col-sm-10">
                <input type="radio" name="religion" value="islam"> Islam
                <input type="radio" name="religion" value="christian"> Christian
                <input type="radio" name="religion" value="buddha"> Buddha
                </div>
            </div>
            <div class="mb-3 row">
            <label for="race" class="col-sm-2 col-form-label">Race</label>
            <div class="col-sm-10">
                <input type="radio" name="race" value="malay"> Malay
                <input type="radio" name="race" value="indian"> Indian
                <input type="radio" name="race" value="chinese"> Chinese
                <input type="radio" name="race" value="others" id="race_others"> Others
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
                <label for="citizenship" class="col-sm-2 col-form-label">Citizenship</label>
                <div class="col-sm-10">
                <input type="radio" name="citizenship" value="malaysian"> Malaysian
                <input type="radio" name="citizenship" value="nonMalay"> Non-Malaysian
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" id="address">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="city" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" id="city">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="state" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="state" id="state">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="country" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="country" id="country">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="zip" class="col-sm-2 col-form-label">Zip Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="zip" id="zip">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phoneNum" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phoneNum" id="phoneNum">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="facebook" id="facebook">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tshirtSize" class="col-sm-2 col-form-label">T-Shirt Size</label>
                <div class="col-sm-10">
                <input type="radio" name="tshirtSize" value="xs"> XS
                <input type="radio" name="tshirtSize" value="s"> S
                <input type="radio" name="tshirtSize" value="m"> M
                <input type="radio" name="tshirtSize" value="l"> L
                <input type="radio" name="tshirtSize" value="xl"> XL
                <input type="radio" name="tshirtSize" value="xxl"> XXL
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dateApply" class="col-sm-2 col-form-label">Date Apply</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dateApply" id="dateApply">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="program" class="col-sm-2 col-form-label">Program</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="program" id="program">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="batch" id="batch">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="status" id="status">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title">
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
                    <label for="referralName" class="col-sm-2 col-form-label">Referral Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="referralName" name="referralName" value="{{ old('referralName') }}">
                    </div>
                </div>
                <div class="mb-3 row referral-info" id="referralInfoBatch" style="display:none;">
                    <label for="referralBatch" class="col-sm-2 col-form-label">Referral Batch</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="referralBatch" name="referralBatch" value="{{ old('referralBatch') }}">
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
                <label for="eduIns" class="col-sm-2 col-form-label">Education Institute</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="eduIns" id="eduIns">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="sponsorship" class="col-sm-2 col-form-label">Sponsorship</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sponsorship" id="sponsorship">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="programFee" class="col-sm-2 col-form-label">Program Fee</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="programFee" id="programFee">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="eduLevel" class="col-sm-2 col-form-label">Education Level</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="eduLevel" id="eduLevel">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="occupation" class="col-sm-2 col-form-label">Occupation</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="occupation" id="occupation">
                </div>
            </div>
            <!--this one tak perlu masuk database just as condition for login-->
            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                <input type="radio" name="role" value="Staff"> Staff
                <input type="radio" name="role" value="Platinum"> Platinum
                <input type="radio" name="role" value="Mentor"> Mentor
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    @endsection
