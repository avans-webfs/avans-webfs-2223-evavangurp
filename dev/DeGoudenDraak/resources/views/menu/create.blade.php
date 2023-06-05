@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg gerecht toe</h1>
        <a href="/admin/menu" class="btn btn-primary">Ga terug</a>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <br>
            <form method="post" action="/admin/menu">
                @csrf
                <div class="form-group">
                    <label for="name">*Naam:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>

                <div class="form-group">
                    <label for="price">*Prijs:</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price"/>
                </div>

                <div class="form-group">
                    <label for="body">Beschrijving:</label>
                    <textarea rows="5" class="form-control" name="body" id="body"></textarea>
                </div>

                <div class="form-group">
                    <label for="addition">Toevoeging:</label>
                    <input type="text" class="form-control" name="addition" id="addition"/>
                </div>

                <label>*Groepen:</label>
                @foreach($types as $type)
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="types" value="{{$type->id}}" id="{{$type->id}}"/>
                    <label for="{{$type->id}}" class="form-check-label">{{$type->name}}</label>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Voeg gerecht toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
