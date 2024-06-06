@extends('layouts.main')

@section('container')
    <section class="vh-100 gradient-custom">
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get("success") }}
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert alert-danger">
                {{ session()->get("error") }}
            </div>
        @endif
        <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="pb-2 pb-md-0"><b>List of Publications</b></h3>
                @if($publications->isEmpty())
                    <p>No publications found.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>University</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>DOI</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publications as $publication)
                                    <tr>
                                        <td>{{ $publication->PD_University }}</td>
                                        <td>{{ $publication->PD_Title }}</td>
                                        <td>{{ $publication->PD_Author }}</td>
                                        <td>{{ $publication->PD_DOI }}</td>
                                        <td>{{ $publication->PD_Type }}</td>
                                        <td>{{ \Carbon\Carbon::parse($publication->PD_Date)->format('Y-m-d') }}</td>
                                        <td><a href="{{ Storage::url($publication->PD_FilePath) }}" target="_blank">{{ $publication->PD_FileName }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
