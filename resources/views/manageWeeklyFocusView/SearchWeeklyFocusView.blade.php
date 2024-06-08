<!-- mentor -->
<!-- search platinum and crmp -->
@extends('layouts.mentormain')
@section('mentor')

<h1>Platinum List (Weekly Focus List)</h1>

<div class="my-3 p-3 bg-body rounded shadow-sm">
  <!-- Search Platinum and CRMP -->
  <div class="pb-3">
    <form class="d-flex" action="{{ url('searchweeklyfocus')}}" method="GET">
        <input class="form-control me-1" type="search" name="search" value="{{ Request::get('search') }}" placeholder="Enter Platinum's Name" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
    </form>
  </div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Platinum Name</th>
      <th scope="col">Weekly Focus List</th>
    </tr>
  </thead>
  <tbody>
  @forelse($platinums as $platinum)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $platinum->P_Name }}</td>
          <td><button class="btn btn-primary">Weekly Focus</button></td>
        </tr>
      @empty
        <tr>
          <td colspan="3">No results found</td>
        </tr>
      @endforelse
  </tbody>
</table>

@endsection