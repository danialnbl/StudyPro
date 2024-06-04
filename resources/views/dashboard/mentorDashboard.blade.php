@extends('layouts.mentormain')

@section('mentor')
<div class=title>
    <h1>WELCOME {{ Auth::user()->name }} !</h1>
</div>
@endsection