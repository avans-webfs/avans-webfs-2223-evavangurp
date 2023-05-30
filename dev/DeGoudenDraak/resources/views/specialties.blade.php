@extends('layout')
@section('content')
<br>
<h1>Aanbiedingen</h1>
<article class="textfield">
    @forelse($specialties as $specialty)
    <div class="row">
        <div class="col text-center">
            <h2>{{$specialty->name}}</h2>
            <p>{{$specialty->description}}</p>
            <p><b>€{{$specialty->price}}{{Str::contains($specialty->price, '.') ? '0' : '.-'}}</b></p>
        </div>
    </div>
    @empty
    <div class="row">
        <h2 class="col text-center">Er zijn op dit moment geen aanbiedingen</h2>
    </div>
    @endforelse
</article>
@stop