@extends('layouts.main')
@section('container')
<style>
    .data-list {
        margin-top: 2rem;
    }
    .data-item {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 1rem;
        margin-bottom: 1rem;
    }
</style>

<div class="container">
    <h1>Expert & Publication Data for P_IC: {{ $P_IC }}</h1>

    <div class="data-list">
        <h2>Publications</h2>
        @if($publications->isEmpty())
            <p>No publications found for this user.</p>
        @else
            @foreach($publications as $publication)
                <div class="data-item">
                    <h3>{{ $publication->PD_Author }}</h3>
                    <p>{{ $publication->PD_File }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <div class="data-list">
        <h2>Experts</h2>
        @if($experts->isEmpty())
            <p>No experts found for this user.</p>
        @else
            @foreach($experts as $expert)
                <div class="data-item">
                    <h3>{{ $expert->E_Name }}</h3>
                    <p>{{ $expert->E_Domain }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
@endsection

