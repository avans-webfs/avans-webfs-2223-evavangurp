@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Gebruikers</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a href="/admin/users/create" class="btn btn-primary" dusk="create-event-button">Creeër nieuwe gebruiker</a>
            <a class="btn btn-secondary" href="/">Terug</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Aangemaakt op</th>
                    <th>Laatst aangepast op</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <form action="/admin/menu/{{$user->id}}" method="post">
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
