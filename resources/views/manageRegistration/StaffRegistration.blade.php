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
       <form action="{{ route('staffReg.submit') }}" method='post'>
            @csrf
            <div class="my-3 p-5 bg-body rounded shadow-sm">
                <h1>Staff Registration</h1>
                <h2>Staff details:</h2>
                <!-- Form Fields Here -->
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='Sname' id="Sname" value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ic" class="col-sm-2 col-form-label">NR IC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='Sic' id="Sic" value="{{ old('ic') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="SphoneNum" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="SphoneNum" id="SphoneNum">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="Semail" id="Semail">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staffID" class="col-sm-2 col-form-label">Staff ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="staffID" id="staffID">
                    </div>
                </div>
            <!--this one tak perlu masuk database just as condition for login-->
            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                <input type="radio" name="role" value="0"> Staff
                <input type="radio" name="role" value="1"> Platinum
                <input type="radio" name="role" value="2"> Mentor
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
