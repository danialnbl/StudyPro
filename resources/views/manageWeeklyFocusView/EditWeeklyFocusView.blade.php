@extends('layouts.main')
@section('container')
<head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery UI CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>
    <h1 class="text-center">Edit Weekly Focus</h1>
    <form id="weeklyFocusForm" method="POST" action="{{ route('WeeklyFocus.edit', ['wf_id' => $weeklyFocus->WF_ID]) }}">
        @csrf
        @method('PUT')

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Weekly Focus Block</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios1" value="admin" {{ $weeklyFocus->block == 'admin' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gridRadios1">
                        Admin Block
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios2" value="focus" {{ $weeklyFocus->block == 'focus' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gridRadios2">
                        Focus Block
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios2" value="recovery" {{ $weeklyFocus->block == 'recovery' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gridRadios2">
                        Recovery Block
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios2" value="social" {{ $weeklyFocus->block == 'social' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gridRadios2">
                        Social Block
                    </label>
                </div>
            </div>
        </fieldset>

        <div id="inputFields">
            <div class="row mb-3">
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="inputinfo[]" value="{{ $weeklyFocus->inputinfo }}">
                </div>
            </div>
        </div>

        <div class="row form-group">
            <label for="wfdate" class="col-sm-3 col-form-label">Weekly Focus Date</label>
            <div class="col-sm-6 mb-3">
                <div class="input-group date">
                    <input type="text" class="form-control" id="date" name="date" value="{{ $weeklyFocus->date }}">
                    <span class="input-group-text bg-white">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>



    <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery UI Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- jQuery UI Datepicker Initialization -->
<script>
    $(document).ready(function() {
        $('#date').datepicker({
            dateFormat: 'yy-mm-dd'  
        });
    });
</script>
</body>
</html>
@endsection