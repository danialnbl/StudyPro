@extends('layouts.main')
@section('container')
<style>
    .data-list {
        margin-top: 2rem;
    }
    .data-item {
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }
    .data-item:hover {
        transform: translateY(-5px);
    }
    .data-item h3 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
    }
    .data-item p {
        margin-bottom: 0;
        color: #6c757d;
    }
    .container h1 {
        margin-bottom: 1.5rem;
        font-size: 2rem;
        color: #343a40;
    }
    .container h2 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-size: 1.75rem;
        color: #495057;
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
                    <p><a href="{{ Storage::url($publication->PD_FilePath) }}" target="_blank">{{ $publication->PD_FileName }}</a></p>
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

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">Back</a>
</div>
@endsection


