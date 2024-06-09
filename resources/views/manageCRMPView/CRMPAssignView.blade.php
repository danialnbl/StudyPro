@extends('layouts.staffmain')
@section('staff')

<!DOCTYPE html>
<html>
<head>
    <title>Assign Platinum as CRMP</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<h1>Assign Platinum as CRMP</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Platinum Name</th>
            <th scope="col">CRMP Menu</th>
        </tr>
    </thead>
    <tbody>
    @forelse($platinums as $platinum)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $platinum->P_Name }}</td>
            <td>
                <button class="btn btn-primary btn-sm assign-crmp" data-p_ic="{{ $platinum->P_IC }}">Assign CRMP</button><br>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">No results found</td>
        </tr>
    @endforelse
    </tbody>
</table>

<script>
$(document).ready(function(){
    $('.assign-crmp').on('click', function(){
        var P_IC = $(this).data('p_ic');
        console.log("P_IC: ", P_IC); // Debug: Check the value of P_IC
        var token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: '/crmpassign/update',
            type: 'POST',
            data: {
                _token: token,
                P_IC: P_IC
            },
            success: function(response) {
                alert(response.success);
                location.reload(); // Reload the page to see the updated status
            },
            error: function(response) {
                alert(response.responseJSON.error);
            }
        });
    });
});
</script>

</body>
</html>
@endsection