@extends('layouts.main')
@section('container')

<!-- Title -->
<div class="mb-3">
    <label for="title" class="form-label">Draft Thesis Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ Session::get('DT_Title')}}">
</div>
<!-- Draft Declaration Cycle -->

<!-- Add more draft thesis --> 
<div class="pb-3">

<!-- <a href="{{url('draftthesis/adddraftthesis')}}" class="btn btn-primary">Add Draft Thesis</a> -->
</div>

<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col-md-1">#</th>
      <th scope="col-md-1">Draft No</th>
      <th scope="col-md-2">Start Date</th>
      <th scope="col-md-2">Complete Date</th>
      <th scope="col-md-2">Total Complete Days</th>
      <th scope="col-md-2">Draft Pages</th>
      <th scope="col-md-2">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($draftThesis as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td> <!-- Index starts from 0, so add 1 to start from 1 -->
            <td>{{ $item->DT_DraftNumber}}</td>
            <td>{{ $item->DT_StartDate }}</td>
            <td>{{ $item->DT_EndDate }}</td>
            <td>" "</td>
            <td>{{ $item->DT_PagesNumber }}</td>
            <td>
          <a href=" " class="btn btn-warning btn-sm">Edit</a> 
          <!-- link ke edit karang -->
          <form onsubmit="return confirm('sure to delete?')" class="d-inline" action="{{ url('draftthesis/'.$item->DT_DraftNumber) }}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit" name="submit" class="btn btn-danger btn-sm" >Del</button></form>
      </td>
  </tr>
  <?php $key++ ?>
  @endforeach
  </tbody>
</table>
@endsection