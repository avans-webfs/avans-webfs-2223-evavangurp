@extends('layout')
@section('content')
<div class="container">
    <br>
    <h1> Nieusberichten </h1>
    <article class="textfield">
        @forelse($articles as $article)
        <div class="row">
            <div class="col text-center">
                <h2>{{$article->title}}</h2>
                <p>{{$article->body}}</p>
            </div>
        </div>
        @empty
        <div class="row">
            <div class="col text-center">
                <h2>Er zijn op het moment geen nieuwsberichten</h2>
            </div>
        </div>
        @endforelse
    </article>
</div>
@stop