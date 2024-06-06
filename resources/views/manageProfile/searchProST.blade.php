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
<!--search-->
<div class="pb-3">
    <form class="d-flex mb-3" action="{{ route('searchProST') }}" method="get">
        <input class="form-control me-2" type="search" name="search" value="{{ request()->get('search') }}" placeholder="Enter your keyword" aria-label="Search">
        <button class="btn btn-custom-search" type="submit">Search</button>
    </form>

    <a href="{{ route('reportStaff') }}" class="btn btn-primary">Generate PDF</a>
</div>

<!--profiles card-->
<div class="row">
@foreach($platinum as $platinum)
    <div class="col-md-4">
        <div class="card card-custom">
            <div class="card-header">{{ $platinum->P_Name }}</div>
            <div class="card-body">
                <h5 class="card-title">{{ $platinum->P_IC }}</h5>
                <p class="card-text">{{ $platinum->P_Status }}</p>
                <a href="{{ route('detailPlatST', ['P_IC' => $platinum->P_IC]) }}" class="btn">Details</a>
                
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection

