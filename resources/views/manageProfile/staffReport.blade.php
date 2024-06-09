<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Report</title>
    <link rel="stylesheet" href="{{ asset('/css/pdf.css') }}" type="text/css">
</head>
<body>
    <h1>List of Platinum Profiles</h1>
    <table class="products">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>NR IC</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Date Apply</th>
        </tr>
        @foreach($platinum as $index => $platinum)
        <tr class="items">
            <td>{{ $index + 1 }}</td>
            <td>{{ $platinum->P_Name }}</td>
            <td>{{ $platinum->P_IC }}</td>
            <td>{{ $platinum->P_Email }}</td>
            <td>{{ $platinum->P_PhoneNumber }}</td>
            <td>{{ $platinum->P_Status }}</td>
            <td>{{ $platinum->P_DateApply }}</td>
        </tr>
        @endforeach
    </table>

    <h1>List of Staff Profiles</h1>
    <table class="products">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Staff ID</th>
            <th>Email</th>
            <th>Phone Number</th>
           
        </tr>
        @foreach($staff as $index => $staff)
        <tr class="items">
            <td>{{ $index + 1 }}</td>
            <td>{{ $staff->S_Name }}</td>
            <td>{{ $staff->S_StaffID }}</td>
            <td>{{ $staff->S_Email }}</td>
            <td>{{ $staff->S_PhoneNumber }}</td>
            
        </tr>
        @endforeach
    </table>

    <h1>List of Mentor Profiles</h1>
    <table class="products">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mentor ID</th>
            <th>Email</th>
            <th>Phone Number</th>
            
        </tr>
        @foreach($mentor as $index => $mentor)
        <tr class="items">
            <td>{{ $index + 1 }}</td>
            <td>{{ $mentor->M_Name }}</td>
            <td>{{ $mentor->M_MentorID }}</td>
            <td>{{ $mentor->M_Email }}</td>
            <td>{{ $mentor->M_PhoneNumber }}</td>
            
        </tr>
        @endforeach
    </table>
</body>
</html>
