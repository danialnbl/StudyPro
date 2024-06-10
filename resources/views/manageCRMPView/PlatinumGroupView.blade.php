<!-- crmp + its platinum list -->
 @extends('layouts.staffmain')
 @section('staff')
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platinum Group</title>
 </head>

 <body>
    <h1>Platinum Group by CRMP</h1>
    <h3>Crmp Name : </h3>

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Platinum Name</th>
    </tr>
  </thead>
  <tbody>
  @forelse($platinums as $platinum)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $platinum->P_Name }}</td>
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