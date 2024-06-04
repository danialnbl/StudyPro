@extends('layouts.staffmain')
@section('staff')
<!--search-->
<div class="pb-3">
        <form class="d-flex" action="{{ route('searchProST') }}" method="get">
            <input class="form-control me-1" type="search" name="search" value="{{ request()->get('search') }}" placeholder="Enter your keyword" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
    </div>
<!--profiles card-->
@foreach($platinum as $platinum)
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$platinum->P_Name}}</h5>
    <p class="card-text">{{$platinum->P_IC}}</p>
    <a href="#" class="btn btn-primary">Details</a>
  </div>
</div>
@endforeach
@endsection