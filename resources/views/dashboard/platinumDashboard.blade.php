@extends('layouts.main')

@section('container')
<div class=title>
    <h1>WELCOME {{ Auth::user()->name }} !</h1>
</div>
@endsection