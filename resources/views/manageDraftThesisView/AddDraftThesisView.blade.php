@extends('layouts.main') 
@section('container') 
<!DOCTYPE html>
<html>
<head>
    <title>Draft Thesis Submission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('DraftThesis.submit') }}" method="POST" id="draftForm">
    @csrf 
    <div class="container">
        <div class="col-sm-6 mb-3">
            <label for="draftno" class="form-label">Draft Number/Version</label>
            <input type="number" class="form-control" id="draftno" name="draftno" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Draft Thesis Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="row form-group">
            <label for="startdate" class="col-sm-3 col-form-label">Draft Start Date</label>
            <div class="col-sm-6 mb-3">
                <div class="input-group date">
                    <input type="date" class="form-control" id="startdate" name="startdate" required>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <label for="enddate" class="col-sm-3 col-form-label">Draft Complete Date</label>
            <div class="col-sm-6 mb-3">
                <div class="input-group date">
                    <input type="date" class="form-control" id="enddate" name="enddate" required>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="pageno" class="form-label">Draft Pages</label>
            <input type="number" class="form-control" id="pageno" name="pageno" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="ddc" class="form-label">Draft Declaration Cycle</label>
            <input type="number" class="form-control" id="ddc" name="ddc" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="totalpages" class="form-label">Total Pages</label>
            <input type="number" class="form-control" id="totalpages" name="totalpages" readonly>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="prepdays" class="form-label">Total Preparation Days</label>
            <input type="number" class="form-control" id="prepdays" name="prepdays" readonly>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="comment" class="form-label">Comments</label>
            <input type="text" class="form-control" id="comment" name="comment">
        </div>
        <div class="row">
            <div class="col-sm-1 mt-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
            <div class="col-sm-1 mt-3">
                <a href="#" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    function calculateTotalPages() {
        var pageno = parseInt($('#pageno').val()) || 0;
        $('#totalpages').val(pageno);
    }

    function calculatePrepDays() {
    var startDate = $('#startdate').val();
    var endDate = $('#enddate').val();
    if (startDate && endDate) {
        var start = moment(startDate, 'YYYY-MM-DD');
        var end = moment(endDate, 'YYYY-MM-DD');
        if (end.isBefore(start)) {
            alert('End date cannot be before start date.');
            $('#enddate').val('');
            $('#prepdays').val('');
        } else {
            var prepDays = Math.abs(end.diff(start, 'days'));
            $('#prepdays').val(prepDays);
        }
    }
}

    $('#pageno').on('input', calculateTotalPages);
    $('#enddate, #startdate').on('change', calculatePrepDays);
    
    $('#draftForm').on('submit', function() {
        calculateTotalPages();
        calculatePrepDays();
        var endDate = $('#enddate').val();
        var startDate = $('#startdate').val();
        if (endDate && startDate) {
            var start = moment(startDate, 'YYYY-MM-DD');
            var end = moment(endDate, 'YYYY-MM-DD');
            if (end.isBefore(start)) {
                alert('End date cannot be before start date.');
                return false;
            }
        }
    });
});

</script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery UI Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
@endsection