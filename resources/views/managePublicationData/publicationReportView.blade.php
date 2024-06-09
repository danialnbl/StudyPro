<!DOCTYPE html>
<html>
<head>
    <title>Publication Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Publication Report for {{ $platinum->P_Name }}</h1>
    <p>Total Publications: {{ $publicationCount }}</p>

    @if($publicationCount > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>University</th>
                    <th>Author</th>
                    <th>DOI</th>
                    <th>Type</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $publication)
                    <tr>
                        <td>{{ $publication->PD_Title }}</td>
                        <td>{{ $publication->PD_University }}</td>
                        <td>{{ $publication->PD_Author }}</td>
                        <td>{{ $publication->PD_DOI }}</td>
                        <td>{{ $publication->PD_Type }}</td>
                        <td>{{ $publication->PD_Date }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No publications found for this Platinum member.</p>
    @endif
</body>
</html>
