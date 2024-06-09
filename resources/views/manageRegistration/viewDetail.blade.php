@extends('layouts.staffmain')

@section('staff')
<style>
    .table-container {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    table, th, td {
        border: 1px solid #ddd;
    }
    
    th, td {
        padding: 8px;
        text-align: left;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    .table-section {
        margin-bottom: 20px;
    }
    
    .section-title {
        font-weight: bold;
        margin-top: 20px;
    }
    
    .two-columns {
        display: flex;
        flex-wrap: wrap;
    }
    
    .column {
        flex: 50%;
        padding: 10px;
    }
</style>

<div class="table-container">
    <div class="two-columns">
        <div class="column">
            <div class="table-section">
                <div class="section-title">Personal Information</div>
                <table>
                    <tr>
                        <th>Name</th>
                        <td>{{$platinum->P_Name}}</td>
                    </tr>
                    <tr>
                        <th>NR IC</th>
                        <td>{{$platinum->P_IC}}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{$platinum->P_Gender}}</td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td>{{$platinum->P_Religion}}</td>
                    </tr>
                    <tr>
                        <th>Race</th>
                        <td>{{$platinum->P_Race}}</td>
                    </tr>
                    <tr>
                        <th>Citizenship</th>
                        <td>{{$platinum->P_Citizenship}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$platinum->P_Address}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{$platinum->P_City}}</td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td>{{$platinum->P_State}}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{$platinum->P_Country}}</td>
                    </tr>
                    <tr>
                        <th>Zip</th>
                        <td>{{$platinum->P_Zip}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{$platinum->P_PhoneNumber}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$platinum->P_Email}}</td>
                    </tr>
                    <tr>
                        <th>Facebook</th>
                        <td>{{$platinum->P_Facebook}}</td>
                    </tr>
                    <tr>
                        <th>T-Shirt Size</th>
                        <td>{{$platinum->P_TshirtSize}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="column">
            <div class="table-section">
                <div class="section-title">Application Information</div>
                <table>
                    <tr>
                        <th>Date Applied</th>
                        <td>{{$platinum->P_DateApply}}</td>
                    </tr>
                    <tr>
                        <th>Program</th>
                        <td>{{$platinum->P_Program}}</td>
                    </tr>
                    <tr>
                        <th>Batch</th>
                        <td>{{$platinum->P_Batch}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$platinum->P_Status}}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{$platinum->P_Title}}</td>
                    </tr>
                </table>
            </div>
            @if($PlatRef)
            <div class="table-section">
                <div class="section-title">Referral Information</div>
                <table>
                    <tr>
                        <th>PR Name</th>
                        <td>{{$PlatRef->PR_Name}}</td>
                    </tr>
                    <tr>
                        <th>PR Batch</th>
                        <td>{{$PlatRef->PR_Batch}}</td>
                    </tr>
                </table>
            </div>
            @else
            <div class="table-section">
                <div class="section-title">Referral Information</div>
                <table>
                    <tr>
                        <th>PR Name</th>
                        <td>Not Available</td>
                    </tr>
                    <tr>
                        <th>PR Batch</th>
                        <td>Not Available</td>
                    </tr>
                </table>
            </div>
            @endif

            <div class="table-section">
                <div class="section-title">Educational Information</div>
                <table>
                    <tr>
                        <th>Education Institute</th>
                        <td>{{$PlatEdu->PE_EduInstitute}}</td>
                    </tr>
                    <tr>
                        <th>Sponsorship</th>
                        <td>{{$PlatEdu->PE_Sponsorship}}</td>
                    </tr>
                    <tr>
                        <th>Program Fee</th>
                        <td>{{$PlatEdu->PE_ProgramFee}}</td>
                    </tr>
                    <tr>
                        <th>Education Level</th>
                        <td>{{$PlatEdu->PE_EduLevel}}</td>
                    </tr>
                    <tr>
                        <th>Occupation</th>
                        <td>{{$PlatEdu->PE_Occupation}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
