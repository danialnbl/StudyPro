@extends('layouts.staffmain')
@section('staff')

<h1>All CRMP List</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Platinum Name</th>
      <th scope="col">Status</th>
      <th scope="col">View Profile</th>
    </tr>
  </thead>
  <tbody>
  @forelse($platinums as $platinum)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $platinum->P_Name }}</td>
          <td>{{ $platinum->P_Status }}</td>
          <td><a href="{{ route('crmp.profile', ['P_IC' => $platinum->P_IC]) }}" class="btn btn-primary">CRMP Profile</a></td>
        </tr>
        @empty
        <tr>
          <td colspan="3">No results found</td>
        </tr>
      @endforelse
  </tbody>
</table>

<div class="d-grid gap-2 col-6 mx-auto">
<a href="/crmpreport" class="btn btn-primary">
            Generate Report CRMP
        </a>
</div>
@endsection