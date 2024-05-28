@extends('layouts.staffmain')
@section('staff')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyPro | Edit Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">NR IC</th>
                <th class="col-md-3">PROGRAM</th>
                <th class="col-md-4">NAME</th>
                <th class="col-md-2">STATUS</th>
                <th class="col-md-2">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($platinum as $platinum)
            <tr>
                <td>{{ $platinum->P_IC }}</td>
                <td>{{ $platinum->P_Program }}</td>
                <td>{{ $platinum->P_Name }}</td>
                <td>{{ $platinum->P_Status }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('viewPlatinum', ['P_IC' => $platinum->P_IC]) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('editPlatinum', ['P_IC' => $platinum->P_IC]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('deletePlatinum', ['P_IC' => $platinum->P_IC]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- AKHIR DATA -->
@endsection
