@extends('layouts.mentormain')

@section('mentor')
<div class="container">
    <h1>Generate Publication Report</h1>

    {{-- Form to search for Platinum member --}}
    <form action="{{ route('GenerateReportPublication.generate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="P_Name">Select Platinum Member:</label>
            <select name="P_Name" id="P_Name" class="form-control" required>
                <option value="">--Select Platinum Name--</option>
                @foreach($platinums as $platinumMember)
                    <option value="{{ $platinumMember->P_Name }}">{{ $platinumMember->P_Name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>

    @if(isset($publications))
        <h3>Report for {{ $platinum->P_Name }}</h3>
        <p>Total Publications: {{ $publicationCount }}</p>
        
        @if($publicationCount > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>University</th>
                        <th>Author</th>
                        <th>DOI</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>File</th>
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
                            <td><a href="{{ Storage::url($publication->PD_FilePath) }}" target="_blank">View File</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No publications found for this Platinum!</p>
        @endif
    @endif
</div>
@endsection
