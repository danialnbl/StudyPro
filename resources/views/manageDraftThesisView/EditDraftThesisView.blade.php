@extends('layouts.main')
@section('container')
<head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery UI CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>
<form action="{{ url('draftthesis/' . $draftThesis->draftno. /edit) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container">
        <div class="col-sm-6 mb-3">
            <label for="draftno" class="form-label">Draft Number</label>
            <div class="col-sm-10">
            $draftThesis->draftno <!-- ini primary, nda bole ditukar -->
            </div>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Draft Thesis Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$draftThesis->title}}">
        </div>
        <div class="row form-group">
            <label for="startdate" class="col-sm-3 col-form-label">Draft Start Date</label>
            <div class="col-sm-6 mb-3">
                <div class="input-group date">
                    <input type="text" class="form-control" id="startdate" name="startdate" value="{{$draftThesis->startdate}}">
                    <span class="input-group-text bg-white">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <label for="enddate" class="col-sm-3 col-form-label">Draft Complete Date</label>
            <div class="col-sm-6 mb-3">
                <div class="input-group date">
                    <input type="text" class="form-control" id="enddate" name="enddate" value="{{$draftThesis->enddate}}">
                    <span class="input-group-text bg-white">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="pageno" class="form-label">Draft Pages</label>
            <input type="number" class="form-control" id="pageno" name="pageno" value="{{$draftThesis->pageno}}">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="ddc" class="form-label">Draft Declaration Cycle</label>
            <input type="number" class="form-control" id="ddc" name="ddc" value="{{$draftThesis->ddc)}}" placeholder="e.g 5 days">
        </div>
        <div class="row">
            <div class="col-sm-1 mt-3">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
            <div class="col-sm-1 mt-3">
                <a href="#" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery UI Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- jQuery UI Datepicker Initialization -->
<script>
    $(document).ready(function() {
        $('#startdate').datepicker({
            dateFormat: 'yy-mm-dd'  // Set the date format
        });
        $('#enddate').datepicker({
            dateFormat: 'yy-mm-dd'  // Set the date format
        });
    });
</script>
</body>
@endsection