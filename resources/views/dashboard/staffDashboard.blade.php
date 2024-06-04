@extends('layouts.staffmain')

@section('staff')
<div class=title>
    <h1>WELCOME {{ Auth::user()->name }} !</h1>
</div>
@endsection