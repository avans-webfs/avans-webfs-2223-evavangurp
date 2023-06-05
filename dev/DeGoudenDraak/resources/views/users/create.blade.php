@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg gebruiker toe</h1>
        <a href="/admin/users" class="btn btn-primary">Ga terug</a>
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
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">*Naam:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>

                <div class="form-group">
                    <label for="email">*E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email"/>
                </div>

                <div class="form-group">
                    <label for="password">*Wachtwoord:</label>
                    <input type="password" class="form-control" name="password" id="password"/>
                </div>

                <label>*Rol:</label>
                @foreach($roles as $role)
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="roles" value="{{$role->id}}" id="{{$role->id}}"/>
                    <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Voeg gebruiker toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
