<!-- for staff check all crmp -->
<!-- when clicked, profile out -->
@extends('layouts.staffmain')
@section('staff')

<table class="table">
    @forelse($platinums as $platinum)
    <tr>
        <td>Name</td>
        <td>{{ $platinum->P_Name }}</td>
    </tr>
    <tr>
        <td>NR IC</td>
        <td>{{ $platinum->P_IC }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $platinum->P_Email }}</td>
    </tr>
    <tr>
        <td>Contact Number</td>
        <td>{{ $platinum->P_PhoneNumber }}</td>
    </tr>
    <tr>
        <td>Facebook</td>
        <td>{{ $platinum->P_Facebook }}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td>{{ $platinum->P_Address }}</td>
    </tr>
    <tr>
        <td>Title</td>
        <td>{{ $platinum->P_Title }}</td>
    </tr>
    @empty
        <tr>
          <td colspan="3">No results found</td>
        </tr>
    @endforelse
</table>
@endsection
