@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg nieuwsartikel toe</h1>
        <a href="/admin/news" class="btn btn-primary">Ga terug</a>
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
            <form method="post" action="/admin/news">
                @csrf
                <div class="form-group">
                    <label for="title">*Titel:</label>
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>

                <div class="form-group">
                    <label for="body">*Tekst:</label>
                    <textarea rows="5" class="form-control" name="body" id="body"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Voeg artikel toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
