@extends('layouts.mentormain')
@section('mentor')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <style>
        .box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>Weekly Focus</title>
</head>

<body>
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif
<div class="container">
<div class="row">
<div class="col-md-8">
    <h1 class="d-inline-block">Weekly Focus List</h1>
</div>

<div class="box">
<h3>Admin Info</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col-md-1">#</th>
                <th scope="col-md-6">Admin Info List</th>
                <th scope="col-md-3">Start Date</th>        
                <th scope="col-md-3">Complete Date</th>     
            </tr>
        </thead>
        <tbody>
            @foreach ($weeklyFocus as $i => $item)
            @if (!empty($item->WF_AdminInfo))
            <tr>
                <td>{{$i+1}}</td>
                <td>{{ $item->WF_AdminInfo }}</td>
                <td>{{$item->WF_StartDate}}</td>
                <td>{{$item->WF_EndDate}}</td>
            </tr>
            <?php $i++ ?>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="box">
<h3>Focus Info</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col-md-1">#</th>
                <th scope="col-md-5">Focus Info List</th>
                <th scope="col-md-3">Start Date</th>
                <th scope="col-md-3">End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeklyFocus as $i => $item)
            @if (!empty($item->WF_FocusInfo))
            <tr>
                <td>{{$i+1}}</td>
                <td>{{ $item->WF_FocusInfo }}</td>
                <td>{{$item->WF_StartDate}}</td>
                <td>{{$item->WF_EndDate}}</td>
            </tr>
            <?php $i++ ?>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="box">
<h3>Recovery Info</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col-md-1">#</th>
                <th scope="col-md-5">Recovery Info List</th>
                <th scope="col-md-3">Start Date</th>
                <th scope="col-md-3">Complete Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeklyFocus as $i => $item)
            @if (!empty($item->WF_RecoveryInfo))
            <tr>
                <td>{{$i+1}}</td>
                <td>{{ $item->WF_RecoveryInfo }}</td>
                <td>{{$item->WF_StartDate}}</td>
                <td>{{$item->WF_EndDate}}</td>
            </tr>
            <?php $i++ ?>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="box">
<h3>Social Info</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col-md-1">#</th>
                <th scope="col-md-5">Social Info List</th>
                <th scope="col-md-3">Start Date</th>
                <th scope="col-md-3">Complete Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeklyFocus as $i => $item)
            @if (!empty($item->WF_SocialInfo))
            <tr>
                <td>{{$i+1}}</td>
                <td>{{ $item->WF_SocialInfo }}</td>
                <td>{{$item->WF_StartDate}}</td>
                <td>{{$item->WF_EndDate}}</td>
                </div>
                </td>
            </tr>
            <?php $i++ ?>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
</div>

<!-- Feedback from crmp + mentor -->
<div class="mb-3">
  <label for="WeeklyFocusComment" class="form-label">Feedback :</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<button class="btn btn-primary">Send Feedback</button>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery UI Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
@endsection