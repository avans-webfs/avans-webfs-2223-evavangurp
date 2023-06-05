@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Gerechten</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a href="/admin/menu/create" class="btn btn-primary" dusk="create-event-button">Creeër nieuw gerecht</a>
            <a class="btn btn-secondary" href="/menu">Terug</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Artikelnummer</th>
                    <th>Toevoeging</th>
                    <th>Naam</th>
                    <th>Prijs</th>
                    <th>Beschrijving</th>
                    <th>Type</th>
                    <th>Aangemaakt op</th>
                    <th>Laatst aangepast op</th>
                    <th colspan = 2>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{$dish->id}}</td>
                        <td>{{$dish->addition}} </td>
                        <td>{{$dish->name}}</td>
                        <td>€{{number_format($dish->price, 2, ',', ' ')}}</td>
                        <td>{{$dish->description}}</td>
                        @if(isset($dish->dishType))
                        <td>{{$dish->dishType->name}}</td>
                        @else
                        <td></td>
                        @endif
                        <td>{{$dish->created_at}}</td>
                        <td>{{$dish->updated_at}}</td>
                        <td>
                            <a href="/admin/menu/{{$dish->id}}/edit" class="btn btn-primary" dusk="edit-event-button">Aanpassen</a>
                        </td>
                        <td>
                            <form action="/admin/menu/{{$dish->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" dusk="remove-event-button">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection
