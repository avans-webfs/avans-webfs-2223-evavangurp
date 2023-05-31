@extends('layout')

@section('content')
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
                    <td>Artikelnummer</td>
                    <td>Toevoeging</td>
                    <td>Naam</td>
                    <td>Prijs</td>
                    <td>Beschrijving</td>
                    <td>Type</td>
                    <td>Toegevoegd</td>
                    <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{$dish->dish_number}}</td>
                        <td>{{$dish->addition}} </td>
                        <td>{{$dish->name}}</td>
                        <td>€{{number_format($dish->price, 2, ',', ' ')}}</td>
                        <td>{{$dish->description}}</td>
                        <td>{{$dish->type}}</td>
                        <td>{{$dish->created_at}}</td>
                        <td>
                            <a href="admin/menu/{{$dish->id}}/edit" class="btn btn-primary" dusk="edit-event-button">Aanpassen</a>
                        </td>
                        <td>
                            <form action="admin/menu/{{$dish->id}}" method="post">
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
