<!-- @extends('layouts.main') -->
<!-- @section('container') -->
<!DOCTYPE html>
<html>
<head>
    <title>Add Draft Thesis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title of draft">
    </div>
    <div class="mb-3">
        <label for="draftno" class="form-label">Draft Number</label>
        <input type="number" class="form-control" id="draftno" placeholder="01">
    </div>
    <div class="row form-group">
        <label for="startdate" class="col-sm-1 col-form-label">Draft Start Date</label>
        <div class="col-sm-4">
            <div class="input-group date" id="datepicker">
                <input type="text" class="form-control">
                <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <label for="completedate" class="col-sm-1 col-form-label">Draft Complete Date</label>
        <div class="col-sm-4">
            <div class="input-group date" id="datepicker">
                <input type="text" class="form-control">
                <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="ddc" class="form-label">Draft Declaration Cycle</label>
        <input type="number" class="form-control" id="draftno" placeholder="01">
    </div>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<!-- @endsection -->
