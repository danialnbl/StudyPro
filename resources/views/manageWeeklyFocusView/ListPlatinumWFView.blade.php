<!-- table platinum utk crmp -->
 @extends('layouts.CRMPMain')
 @section('crmp')
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRMP view weekly focus under his/her supervision</title>
 </head>

 <body>
    <h2>My Platinum Weekly Focus</h2>
        <table class="table table-hover">
        <thead>
            <th>Platinum Name</th>
            <th>View Weekly Focus</th>
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