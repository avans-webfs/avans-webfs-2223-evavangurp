@extends('layouts.guest-layout')
@section('page')
<h1>Menu</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($types as $type)
    <div class="col">
        <div class="card h-100 d-flex align-items-top">
            <div class="card-body">
                <h5 class="card-title" style="color:black">{{$type->name}}</h5>
                <ul class="list-group list-group-flush">
                    @foreach($type->dishes as $dish)
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="p-2 flex-grow-1">{{$dish->id}}{{$dish->addition}}. {{$dish->name}}</p>
                        <p class="p-2">€{{$dish->price}}{{Str::contains($dish->price, '.') ? '0' : '.-'}}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <br>
    </div>
    @endforeach
</div>
@stop