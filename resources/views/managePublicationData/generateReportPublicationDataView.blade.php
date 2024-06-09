@extends('layouts.mentormain')

@section('mentor')
<style>
    .btn-custom-search {
        background-color: #28a745; /* Green background color */
        color: white;
        border: 1px solid #28a745;
    }
    .btn-custom-search:hover {
        background-color: #218838; /* Darker green on hover */
        color: white;
        border: 1px solid #218838;
    }
</style>
<div class="container">
    <div class="card" style="border-radius: 15px;">
        <div class="card-body p-4 p-md-5">
            <h3 class="pb-2 pb-md-0"><b>Generate Publications Report</b></h3>
            <form action="{{ route('SearchPublicationM.search') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="SearchM" class="form-control" placeholder="Search by name...">
                    <button type="submit" class="btn btn-custom-search">Search</button>
                </div>
            </form>

    {{-- Platinum Members Table --}}
    <div class="table-responsive">
        <table class="table table-bordered" id="platinumTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Platinum Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($platinums as $index => $platinum)
                    <tr class="platinum-row">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $platinum->P_Name }}</td>
                        <td>{{ $platinum->P_Email }}</td>
                        <td>{{ $platinum->P_PhoneNumber }}</td>
                        <td>
                            <form action="{{ route('GenerateReportPublication.generate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="P_Name" value="{{ $platinum->P_Name }}">
                                <button type="submit" class="btn btn-sm btn-primary">Generate PDF</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

@section('scripts')
<script>
    // Function to filter table rows based on search input
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("P_Name");
        filter = input.value.toUpperCase();
        table = document.getElementById("platinumTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Attach filterTable function to input event
    document.getElementById("P_Name").addEventListener("input", filterTable);

    // Initially hide the search form if no text is typed
    document.addEventListener("DOMContentLoaded", function() {
        filterTable();
    });
</script>
@endsection
