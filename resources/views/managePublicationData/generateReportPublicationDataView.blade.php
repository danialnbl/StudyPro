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
                @foreach($platinums as $platinumName)
                    <option value="{{ $platinumName->P_Name }}">{{ $platinumName->P_Name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>
@endsection
