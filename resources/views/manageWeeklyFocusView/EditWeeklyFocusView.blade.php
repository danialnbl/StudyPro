@extends('layouts.main')
@section('container')
<head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery UI CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>
<h1 class="text-center">Edit Weekly Focus</h1>
<form action="{{ route('WeeklyFocus.edit', ['wf_id' => $weeklyFocus->WF_ID]) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Weekly Focus Block</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="block" id="gridRadios1" value="admin" {{ $weeklyFocus->WF_Block == 'admin' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridRadios1">Admin Block</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="block" id="gridRadios2" value="focus" {{ $weeklyFocus->WF_Block == 'focus' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridRadios2">Focus Block</label>
            </div>
            <div class="form-check disabled">
                <input class="form-check-input" type="radio" name="block" id="gridRadios3" value="recovery" {{ $weeklyFocus->WF_Block == 'recovery' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridRadios3">Recovery Block</label>
            </div>
            <div class="form-check disabled">
                <input class="form-check-input" type="radio" name="block" id="gridRadios4" value="social" {{ $weeklyFocus->WF_Block == 'social' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridRadios4">Social Block</label>
            </div>
        </div>
    </fieldset>

    <div id="inputFields">
        <div class="row mb-3">
            <div class="col-sm-10">
            <input type="text" class="form-control" name="inputinfo[]" value="{{ $weeklyFocus->inputinfo }}" required>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <label for="date" class="col-sm-3 col-form-label">Weekly Focus Date</label>
        <div class="col-sm-6 mb-3">
            <div class="input-group date">
                <input type="date" class="form-control" id="date" name="date" value="{{ $weeklyFocus->WF_Date }}" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>


    <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery UI Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
@endsection