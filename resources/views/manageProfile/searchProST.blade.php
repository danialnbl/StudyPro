@extends('layouts.staffmain')
@section('staff')
<style>
    .card-custom {
        max-width: 18rem;
        background-color: #007bff;
        color: #000000;
        border: none;
        margin-bottom: 1rem;
    }
    .card-custom .card-header {
        font-weight: bold;
        background-color: #FFFFFF;
        color: #000000;
    }
    .card-custom .card-body {
        background-color: #9DE3F9;
    }
    .card-custom .btn {
        background-color: white;
        color: #007bff;
        border: 1px solid white;
        margin-top: 0.5rem;
    }
    .card-custom .btn:hover {
        background-color: #0069d9;
        color: white;
        border: 1px solid #0069d9;
    }
    .search-bar {
        padding-bottom: 1rem;
    }
    .search-bar .form-control {
        margin-right: 0.5rem;
    }
    .btn-custom-search {
        background-color: #28a745; /* Green background color */
        color: white;
        border: 1px solid #28a745;
    }
    .btn-custom-search:hover {
        background-color: #218838; /* Darker green on hover */
        color: white;
        border: 1px solid #218838;
    }
</style>

<!-- Filter and Search Bar -->
<div class="pb-3">
    <form class="d-flex mb-3" action="{{ route('searchProST') }}" method="get">
        <input class="form-control me-2" type="search" name="search" value="{{ request()->get('search') }}" placeholder="Enter your keyword" aria-label="Search">

        <select class="form-control me-2" name="P_Batch">
            <option value="">Select Batch</option>
            @foreach($batches as $batch)
                <option value="{{ $batch }}" {{ request()->get('P_Batch') == $batch ? 'selected' : '' }}>{{ $batch }}</option>
            @endforeach
        </select>

        <select class="form-control me-2" name="P_Status">
            <option value="">Select Status</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}" {{ request()->get('P_Status') == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>

        <button class="btn btn-custom-search" type="submit">Search</button>
    </form>

    <a href="{{ route('reportStaff', ['search' => request()->get('search'), 'P_Batch' => request()->get('P_Batch'), 'P_Status' => request()->get('P_Status')]) }}" class="btn btn-primary">Generate PDF</a>
</div>

<!-- Profiles Card -->
<div class="row">
@foreach($platinum as $platinumMember)
    <div class="col-md-4">
        <div class="card card-custom">
            <div class="card-header">{{ $platinumMember->P_Name }}</div>
            <div class="card-body">
                <h5 class="card-title">NR IC: {{ $platinumMember->P_IC }}</h5>
                <p class="card-text">Status: {{ $platinumMember->P_Status }}</p>
                <p class="card-text">Batch: {{ $platinumMember->P_Batch }}</p>
                <a href="{{ route('detailPlatST', ['P_IC' => $platinumMember->P_IC]) }}" class="btn">Details</a>
            </div>
        </div>
    </div>
@endforeach
@foreach($staff as $staffMember)
    <div class="col-md-4">
        <div class="card card-custom">
            <div class="card-header">{{ $staffMember->S_Name }}</div>
            <div class="card-body">
                <h5 class="card-title">Staff ID: {{ $staffMember->S_StaffID }}</h5>
                <p class="card-text">Email: {{ $staffMember->S_Email }}</p>
                <a href="{{ route('detailStaffST', ['S_IC' => $staffMember->S_IC]) }}" class="btn">Details</a>
            </div>
        </div>
    </div>
@endforeach
@foreach($mentor as $mentorMember)
    <div class="col-md-4">
        <div class="card card-custom">
            <div class="card-header">{{ $mentorMember->M_Name }}</div>
            <div class="card-body">
                <h5 class="card-title">Mentor ID: {{ $mentorMember->M_MentorID }}</h5>
                <p class="card-text">Email: {{ $mentorMember->M_Email }}</p>
                <a href="{{ route('detailMentorST', ['M_IC' => $mentorMember->M_IC]) }}" class="btn">Details</a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
