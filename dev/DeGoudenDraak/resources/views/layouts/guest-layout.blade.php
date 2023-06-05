@extends('layouts.layout')
@section('head')
<link rel="stylesheet" href="{{ asset('/css/guest-layout.css')}}">
@stop
@section('body')
    @yield('page')
@stop