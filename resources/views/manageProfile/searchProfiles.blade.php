@extends('layouts.main')
@section('container')
<style>
    .card-custom {
        max-width: 18rem;
        background-color: #007bff;
        color: white;
        border: none;
        margin-bottom: 1rem;
    }
    .card-custom .card-header {
        font-weight: bold;
        background-color: #FFFFFF;
        color :#000000;
    }
    .card-custom .card-body {
        background-color: rgba(0, 123, 255, 0.75);
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
</style>

<!--search-->
<div class="search-bar">
    <form class="d-flex" action="{{ route('searchProfile') }}" method="get">
        <input class="form-control me-1" type="search" name="search" value="{{ request()->get('search') }}" placeholder="Enter your keyword" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
    </form>
</div>

<!--profiles card-->
@foreach($platinum as $platinum)
<div class="card card-custom">
    <div class="card-header">{{ $platinum->P_Name }}</div>
    <div class="card-body">
        <h5 class="card-title">{{ $platinum->P_IC }}</h5>
        <p class="card-text">{{ $platinum->P_Status }}</p>
        <a href="{{ route('detailPlatinum', ['P_IC' => $platinum->P_IC]) }}" class="btn">Details</a>
        <a href="#" class="btn">Expert & Publication Data</a>
    </div>
</div>
@endforeach
@endsection

