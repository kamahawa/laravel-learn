@extends('views.master')


@section('content')

@if(Auth::check())
{!! Auth::user()->name !!}
@endif

@stop