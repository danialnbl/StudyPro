<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRMP Report</title>
    <link rel="stylesheet" href="{{ asset('/css/pdf.css') }}" type="text/css">
</head>

<body>
<h1>List of Coach Roket Master PhD(CRMP)</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Title</th>
      <th scope="col">Gender</th>
      <th scope="col">Program</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @forelse($platinums as $platinum)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $platinum->P_Name }}</td>
          <td>{{ $platinum->P_Title }}</td>
          <td>{{ $platinum->P_Gender }}</td>
          <td>{{ $platinum->P_Program }}</td>
          <td>{{ $platinum->P_Email }}</td>
          <td>{{ $platinum->P_PhoneNumber }}</td>
          <td>{{ $platinum->P_Status}}</td>
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