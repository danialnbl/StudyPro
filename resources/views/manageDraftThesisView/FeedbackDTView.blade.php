@extends('layouts.mentormain')
@section('mentor')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Add more draft thesis --> 
<div class="row">
  <div class="col-md-8">
    <h1 class="d-inline-block">Draft Thesis Performance</h1>
  </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Draft No</th>
            <th>Start Date</th>
            <th>Complete Date</th>
            <th>Total Complete Days</th>
            <th>Draft Pages</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($draftThesis as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->DT_DraftNumber }}</td>
                <td>{{ $item->DT_StartDate }}</td>
                <td>{{ $item->DT_EndDate }}</td>
                <td>{{ $item->DT_PrepDays }}</td>
                <td>{{ $item->DT_PagesNumber }}</td>
                <td>
                    <a href="{{ route('DraftThesis.edit', ['draftid' => $item->DT_ID]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('sure to delete?')" class="d-inline" action="{{ route('DraftThesis.delete', ['draftid' => $item->DT_ID]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <div class="mt-3">
        <strong>Total Pages: </strong>{{$totalpages}}
    </div>

<!-- Feedback from crmp + mentor -->
<div class="mb-3">
  <label for="DraftThesisComment" class="form-label"></label>
  <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
</div>
<button class="btn btn-primary">Send Feedback</button>

</body>
</html>
@endsection