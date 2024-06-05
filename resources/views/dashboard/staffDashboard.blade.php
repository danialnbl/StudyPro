@extends('layouts.staffmain')
@section('staff')

<div class="title">
    <h1>WELCOME {{ Auth::user()->name }}!</h1>
</div>

<div class="dashboard">
    <div class="card">
        <div class="card-body">
            <h3>Total Registered Platinum </h3>
            <h2>{{$platinumCount}} <i class="fas fa-user"></i></h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Total Experts </h3>
            <h2>{{$expertCount}} <i class="fas fa-user"></i></h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Total Mentor </h3>
            <h2>{{$mentorCount}} <i class="fas fa-user"></i></h2>
        </div>
    </div>
</div>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    .title {
        text-align: center;
        margin-top: 20px;
        color: #000;
    }
    .dashboard {
        margin: 20px;
        padding: 20px;
        background-image: url(''); 
        background-color: #6AC1F2; 
        background-size: cover;
        background-position: center;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .card {
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        text-align: center;
    }
    .card-body h3 {
        margin-bottom: 10px;
    }
    .card-body h2 {
        font-size: 2.5rem;
        margin: 0;
    }
</style>
@endsection