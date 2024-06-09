<!-- table platinum name for crmp's platinum-->
 @extends('layouts.CRMPmain')
 @section('crmp')

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRMP view Platinum under him/her</title>
 </head>

 <body>
    <h2>My Platinum Draft Thesis</h2>
    <table class="table table-hover">
        <thead>
            <th>#</th>
            <th>Platinum Name</th>
            <th>View Draft Thesis</th>
        </thead>
        <tbody>
        @forelse($platinums as $platinum)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $platinum->P_Name }}</td>
            <td><button class="btn btn-primary">Give Feedback</button></td>
            </tr>
            </tr>
            @empty
                <tr>
                    <td colspan="3">No results found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
 </body>
 </html>
 @endsection