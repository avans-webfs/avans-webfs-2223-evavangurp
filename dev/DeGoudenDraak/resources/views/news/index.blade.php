@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Nieuwsartikelen</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a href="/admin/news/create" class="btn btn-primary" dusk="create-event-button">Creeër nieuw artikel</a>
            <a class="btn btn-secondary" href="/news">Terug</a>
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
                    <th>Titel</th>
                    <th>Tekst</th>
                    <th>Aangemaakt op</th>
                    <th>Laatst aangepast op</th>
                    <th colspan = 2>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}} </td>
                        <td>{{$article->body}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>{{$article->updated_at}}</td>
                        <td>
                            <a href="/admin/news/{{$article->id}}/edit" class="btn btn-primary" dusk="edit-event-button">Aanpassen</a>
                        </td>
                        <td>
                            <form action="/admin/news/{{$article->id}}" method="post">
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
