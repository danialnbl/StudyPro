@extends('layouts.main')
@section('container')
<head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery UI CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>
    <h1 class="text-center">Add Weekly Focus</h1>
    <form id="weeklyFocusForm" method="POST" action="{{ route('WeeklyFocus.submit') }}">
        @csrf
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Weekly Focus Block</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios1" value="admin" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Admin Block
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios2" value="focus">
                    <label class="form-check-label" for="gridRadios2">
                        Focus Block
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios3" value="recovery">
                    <label class="form-check-label" for="gridRadios3">
                        Recovery Block
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="block" id="gridRadios4" value="social">
                    <label class="form-check-label" for="gridRadios4">
                        Social Block
                    </label>
                </div>
            </div>
        </fieldset>

        <div class="row mb-3">
            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputinfo[]" required>
            </div>
        </div>

        <div class="row form-group">
            <label for="startdate" class="col-sm-3 col-form-label">Weekly Focus Start Date</label>
            <div class="col-sm-6 mb-3">
                <input type="date" class="form-control" id="startdate" name="startdate" required>
            </div>
        </div>

        <div class="row form-group">
            <label for="enddate" class="col-sm-3 col-form-label">Weekly Focus Complete Date</label>
            <div class="col-sm-6 mb-3">
                <input type="date" class="form-control" id="enddate" name="enddate" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </div>
    </form>
</body>


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery UI Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
@endsection