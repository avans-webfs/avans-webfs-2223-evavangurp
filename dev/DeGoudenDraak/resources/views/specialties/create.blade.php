@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg specialiteit toe</h1>
        <a href="/admin/specialties" class="btn btn-primary">Ga terug</a>
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
            <form method="post" action="/admin/specialties">
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
                    <label for="description">Beschrijving:</label>
                    <textarea rows="5" class="form-control" name="description" id="description"></textarea>
                </div>

                <label>*Gerechten:</label>
                @foreach($dishes as $dish)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="dishes[]" value="{{$dish->id}}" id="{{$dish->id}}"/>
                    <label for="{{$dish->id}}" class="form-check-label">{{$dish->name}}</label>
                </div>
                @endforeach

                <label>*Toevoeging:</label>
                @foreach($additions as $addition)
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="addition" value="{{$addition->id}}" id="{{$addition->id}}"/>
                    <label for="{{$addition->id}}" class="form-check-label">{{$addition->name}}</label>
                </div>
                @endforeach
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="addition" value="" id="none" checked/>
                    <label for="none" class="form-check-label">Niks</label>
                </div>

                <button type="submit" class="btn btn-primary">Voeg gerecht toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
