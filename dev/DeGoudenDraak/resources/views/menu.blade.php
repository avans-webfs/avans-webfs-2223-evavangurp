@extends('layout')
@section('content')
<h1>Menu</h1>
<div class="row">
    @foreach($types as $type)
    <div class="col">
        <h3>{{$type->name}}</h3>
        <br>
        @foreach($type->dishes as $dish)
        <p>{{$dish->name}}</p>
        @endforeach
    </div>
    @endforeach
</div>
@stop