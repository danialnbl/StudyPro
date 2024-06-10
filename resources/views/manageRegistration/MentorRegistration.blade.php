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
       <form action="{{ route('mentorReg.submit') }}" method='post'>
            @csrf
            <div class="my-3 p-5 bg-body rounded shadow-sm">
                <h1>Mentor Registration</h1>
                <h2>Mentor details:</h2>
                <!-- Form Fields Here -->
                <div class="mb-3 row">
                    <label for="M_Name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='M_Name' id="M_Name" value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="M_IC" class="col-sm-2 col-form-label">NR IC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='M_IC' id="M_IC" value="{{ old('ic') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="M_PhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="M_PhoneNumber" id="M_PhoneNumber">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="M_Email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="M_Email" id="M_Email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="M_MentorID" class="col-sm-2 col-form-label">Mentor ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="M_MentorID" id="M_MentorID">
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
