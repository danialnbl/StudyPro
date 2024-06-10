@extends('layouts.staffmain')
@section('staff')
<!-- assign platinum to its group -->
<h1>All Platinum List</h1>

<div class="my-3 p-3 bg-body rounded shadow-sm">
  <!-- Search Platinum and CRMP -->
  <div class="pb-3">
    <form class="d-flex" action="{{ url('searchplatinum')}}" method="GET">
        <input class="form-control me-1" type="search" name="search" value="{{ Request::get('search') }}" placeholder="Enter Platinum's Name" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
    </form>
  </div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Platinum Name</th>
      <th scope="col">Assign Platinum Group</th>
      <th>Confirmation</th>
    </tr>
  </thead>
  <tbody>
  @forelse($platinums as $platinum)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $platinum->P_Name }}</td>
          <td>
          <div class="dropdown">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              CRMP Name
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Platinum Group 1</a></li>
              <li><a class="dropdown-item" href="#">Platinum Group 2</a></li>
              <li><a class="dropdown-item" href="#">Platinum Group 3</a></li>
            </ul>
          </div>
          </td>
          <td><button class="btn btn-primary">Confirm</button></td>
        </tr>
      @empty
        <tr>
          <td colspan="3">No results found</td>
        </tr>
      @endforelse
  </tbody>
</table>

@endsection