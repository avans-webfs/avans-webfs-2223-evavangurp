@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Specialiteiten</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a href="/admin/specialties/create" class="btn btn-primary" dusk="create-event-button">Creeër nieuwe specialiteit</a>
            <a class="btn btn-secondary" href="/specialties">Terug</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Prijs</th>
                    <th>Beschrijving</th>
                    <th>Gerechten</th>
                    <th>Toevoeging</th>
                    <th>Aangemaakt op</th>
                    <th>Laatst aangepast op</th>
                    <th colspan = 2>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($specialties as $specialty)
                    <tr>
                        <td>{{$specialty->name}}</td>
                        <td>€{{number_format($specialty->price, 2, ',', ' ')}}</td>
                        <td>{{$specialty->description}}</td>
                        <td>
                            @foreach($specialty->dishes as $dish)
                            {{$dish->name}}, 
                            @endforeach
                        </td>
                        <td>{{$specialty->addition}}</td>
                        <td>{{$specialty->created_at}}</td>
                        <td>{{$specialty->updated_at}}</td>
                        <td>
                            <a href="/admin/specialties/{{$specialty->id}}/edit" class="btn btn-primary" dusk="edit-event-button">Aanpassen</a>
                        </td>
                        <td>
                            <form action="/admin/specialties/{{$specialty->id}}" method="post">
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
